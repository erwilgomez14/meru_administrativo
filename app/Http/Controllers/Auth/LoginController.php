<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrativo\Meru_Administrativo\Configuracion\RegistroControl;
use App\Models\User;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Sobreescribir metodo para crear la variable de sesion
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        if (RegistroControl::periodosAbiertos()->count() == 1) {
            session(['ano_pro' => RegistroControl::periodoActual()]);
        } else {
            session(['ano_pro' => '']);
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Usuario::where('uid', $request->username)->first();

        if (!$user) {
            // return redirect()->route('login')->with('message', 'Usuario no activo en recursos humanos');
            return redirect()->route('login')->with('alert', 'Credenciales no encontradas');
        }

        if ($user && $user->idstatus === 1) {
            if ($user->clave === md5($request->password)) {
                $userad = User::where('usuario', $user->uid)->first();

                if ($userad && $userad->status === '1') {
                    Auth::login($userad);

                    if (RegistroControl::periodosAbiertos()->count() == 1) {
                        session(['ano_pro' => RegistroControl::periodoActual()]);
                    } else {
                        session(['ano_pro' => '']);
                    }

                    return redirect()->route('home');
                } else if ($userad && $userad->status !== '1') {
                    return redirect()->route('login')->with('alert', 'Usuario inactivo');
                } else {
                    return redirect()->route('login')->with('alert', 'Contacte con su administrador de sistemas');
                }
            }else {
                return redirect()->route('login')->with('alert', 'Contraseña Inconrrecta');
                }
        } else {
            return redirect()->route('login')->with('alert', 'Usuario no activo en recursos humanos');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
