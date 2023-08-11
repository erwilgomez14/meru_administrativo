<?php

namespace App\Http\Controllers\Administrativo\Meru_Administrativo\Configuracion\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\Cargos;
use App\Models\CargoxUnidad;
use App\Models\Datos_empleados;
use App\Models\ExpedienteRH;
use App\Models\GerenciaADM;
use App\Models\GerentexGerencia;
use App\Models\User;
use App\Models\Usuario;
use App\Traits\ReporteDompdf;
// use App\Traits\ReportFpdf;
use Auth;
// use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class UsuarioController extends Controller
{
    use ReporteDompdf;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrativo.meru_administrativo.configuracion.configuracion.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrativo.meru_administrativo.configuracion.configuracion.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User;
        $ultimo_id = User::orderBy('id', 'desc')->first();

        // dd($ultimo_id);

        $usuario->usuario = $request->usuario;
        $usuario->cedula = $request->cedula;
        $usuario->nombre = $request->nombre;
        $usuario->cargo = $request->id_cargo;

        if ($request->telefono == null) {
            $usuario->telf = $request->celular;
        } else {
            $usuario->telf = $request->telefono;
        }

        $usuario->correo_gte = $request->emailge;
        $usuario->nom_gte = $request->nombrege;
        $usuario->status = 1;
        $usuario->iniciales = substr($request->iniciales, 0, 2);
        $usuario->id = $ultimo_id->id + 1;
        // dd($usuario->iniciales);
        $gerenciaADM = GerenciaADM::where('des_ger', $request->gerencia)->first();

        $usuario->cod_ger = $gerenciaADM->cod_ger;

        $usuario->fecha = now();

        $usuario->usuario_crea = Auth::user()->usuario;
        $usuario->codemp = $request->cedula;
        $usuario->ano_fiscal = 0;
        $usuario->correo = $request->email;
        $usuario->ficha = $request->ficha;

        //dd($usuario);


        $usuario->save();

        return redirect()->route('configuracion.configuracion.usuario.index')->with('status', 'Usuario: ' . $usuario->id . ' Registrados Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function usuarioBuscar(Request $request)
    {
        // dd($request);
        if ($request->cedula == null) {
            $error = 'Debe ingresar un numero de cedula valido';
            return response()->json(['error' => $error], 400); // 400: Bad Request
        }

        $userRH = Usuario::where('cedula', $request->cedula)->first();


        if ($userRH && $userRH->idstatus == 1) {
            $userAD = User::where('cedula', $userRH->cedula)->first();
            //dd($userAD);
            if ($userAD && $userAD->status == 1) {
                $error = 'El usuario: ' . $userAD->nombre . ' ya se encuentra registrado y activo';
                return response()->json(['error' => $error], 400); // 400: Bad Request
            }
            if ($userAD && $userAD->status == 0) {
                $error = 'El usuario: ' . $userAD->nombre . ' ya se encuentra registrado pero no esta activo';
                return response()->json(['error' => $error], 400); // 400: Bad Request
            }
            //dd($userRH);
            $expediente = ExpedienteRH::where('cedula', $userRH->cedula)->first();
            // dd($expediente->telefono);
            $expxunidad = CargoxUnidad::where('idempleado', $expediente->idempleado)->orderBy('fecasignacioncargo', 'desc')
                ->first();

            $cargo = Cargos::where('idcargoxnivel', $expxunidad->idcargoxnivel)->first();

            $datos_expendientes = Datos_empleados::where('cedula', $userRH->cedula)->first();
            // $datos_expendientes = Datos_empleados::first();
            $palabras = str_word_count($datos_expendientes->nombre, 1);
            $iniciales = '';
            foreach ($palabras as $palabra) {
                $iniciales .= strtoupper(substr($palabra, 0, 1)); // Obtiene la primera letra de cada palabra y la convierte en mayúscula
            }

            $gerente = GerentexGerencia::where('idgerencia', $datos_expendientes->idgerencia)->first();

            // dd($datos_expendientes);
            // Renderizar la vista del formulario
            $formulario = view(
                'administrativo.meru_administrativo.configuracion.configuracion.usuarios.partials._form1',
                compact('userRH', 'cargo', 'expediente', 'datos_expendientes', 'iniciales', 'gerente')
                /*['data' => $userRH, 'cargo' => $cargo, 'expediente' => $expediente]*/
            )->render();
            //dd($formulario);
            return response()->json(['formulario' => $formulario]);
        } elseif ($userRH && $userRH->idstatus != 1) {
            $error = 'Usuario no inactivo en Recursos humanos';
            return response()->json(['error' => $error], 400); // 400: Bad Request
        } else {
            $error = 'Usuario no existe en Recursos humanos';
            return response()->json(['error' => $error], 400); // 400: Bad Request
        }
    }

    public function cambiarEstado(Request $request, $id)
    {
        // dd($request);
        $user = User::findOrFail($id);

        // dd($user);

        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            $status = $user->status;

            return response()->json(['message' => 'Estado cambiado ha: Activo exitosamente', 'user' => $status]);
        } else {
            // $msg = 'Inactivo';
            $user->status = 0;
            $user->save();
            $status = $user->status;
            $error = 'Estado cambiado ha: Inactivo exitosamente';
            return response()->json(['error' => $error, 'user' => $status], 400);
        }

        // return response()->json(['message' => 'Estado cambiado ha: ' . $msg . ' exitosamente']);
    }

    public function cambiarAnofiscal(Request $request, $id)
    {
        // dd($request);
        $user = User::findOrFail($id);

        //dd($user);

        if ($user->ano_fiscal == 0) {
            $user->ano_fiscal = 1;
            $user->save();
            $dualidad = $user->ano_fiscal;

            return response()->json(['message' => 'Dualidad Activada', 'user' => $dualidad]);
        } else {
            // $msg = 'Inactivo';
            $user->ano_fiscal = 0;
            $user->save();
            $error = 'Dualidad Desactivada';
            $dualidad = $user->ano_fiscal;

            return response()->json(['error' => $error, 'user' => $dualidad], 400);
        }

        // return response()->json(['message' => 'Estado cambiado ha: ' . $msg . ' exitosamente']);
    }

    public function print_usuarios()
    {
        $usuarios = User::where('status', 1)->get();
        // dd($usuarios->cargoxnivel->descargoxnivel);
        // $cargo = Cargos::where('');
        $data = [];

        foreach ($usuarios as $usuario) {
            $descripcion = isset($usuario->cargoxnivel) ? $usuario->cargoxnivel->descargoxnivel : '';
            // Agrega los valores que deseas a $datos
            $data[] = [
                'Cedula' => $usuario->cedula,
                'Nombre' => $usuario->nombre,
                'Usuario' => $usuario->usuario,
                'Codigo del Cargo' => $usuario->cargo,
                'Descripcion del Cargo' => $descripcion,
                // Agrega más valores si es necesario
            ];
        }

        $columnasReferencia = array_keys($data[0]);


        // Título para la segunda columna
        $tituloColumna2 = 'Listado de Usuarios Activos';
        $altura = 75; //px

        // $titulosColumnas = ['Cedula', 'Nombre', 'Usuario', 'Codigo del Cargo', 'Descripcion del Cargo']; // Cambia estos títulos según tus necesidades
        $titulosColumnas = [
            'Cedula' => '15%',  // Ejemplo de tamaño personalizado
            'Nombre' => '30%',
            'Usuario' => '15%',
            'Codigo del Cargo' => '20%',
            'Descripcion del Cargo' => '30%',
        ];
        // Generar el PDF utilizando el trait
        $pdfContent = $this->generatePdf($data, $tituloColumna2, $altura, $titulosColumnas);

        // Devolver el PDF como respuesta
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="example.pdf"',
        ]);
    }
}
