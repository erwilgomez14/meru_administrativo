<form method="POST" action="{{ route('configuracion.configuracion.usuario.index') }}">
    @csrf
    <!-- Agrega aquí tus campos de formulario -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $datos_expendientes->nombre }}" class="form-control" readonly>

    <label class="mt-2" for="usuario">Usuario:</label>
    <input type="text" name="usuario" value="{{ $userRH->uid }}" class="form-control" readonly>

    <label for="cedula" class="mt-2">Cedula:</label>
    <input type="text" name="cedula" value="{{ $userRH->cedula }}" class="form-control" readonly>

    <label for="cargo" class="mt-2">Cargo:</label>
    <div class="row">
        <div class="col-3">
            <input type="text" name="id_cargo" value="{{ $cargo->codcargoxnivel }}" class="form-control" readonly>
        </div>
        <div class="col">

            <input type="text" name="cargo" value="{{ $cargo->descargoxnivel }}" class="form-control" readonly>
        </div>

    </div>

    <label for="cargo" class="mt-2">Gerencia:</label>
    <div class="row">
        <div class="col-3">
            <input type="text" name="id_gerencia" value="{{ $datos_expendientes->idgerencia }}" class="form-control"
                readonly>
        </div>
        <div class="col">

            <input type="text" name="gerencia" value="{{ $datos_expendientes->desgerencia }}" class="form-control"
                readonly>
        </div>

    </div>

    <label for="unidad" class="mt-2">Unidad:</label>
    <div class="row">
        <div class="col-3">
            <input type="text" name="idunidadestructura" value="{{ $datos_expendientes->idunidadestructura }}"
                class="form-control" readonly>
        </div>
        <div class="col">

            <input type="text" name="desunidadestructura" value="{{ $datos_expendientes->desunidadestructura }}"
                class="form-control" readonly>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <label for="ficha" class="mt-2">Ficha:</label>
            <input type="text" name="ficha" value="{{ $datos_expendientes->sigla.'-'.$datos_expendientes->idficha }}" class="form-control" readonly>
        </div>
        <div class="col">
            <label for="telefono" class="mt-2">Telefono:</label>
            <input type="text" name="telefono" value="{{ $expediente->telefono }}" class="form-control" readonly>
        </div>
        <div class="col">
            <label for="celular" class="mt-2">Celular:</label>
            <input type="text" name="celular" value="{{ $datos_expendientes->celular }}" class="form-control" readonly>
        </div>
        <div class="col">
            <label for="iniciales" class="mt-2">Inciales:</label>
            <input type="text" name="iniciales" value="{{ $iniciales }}" class="form-control" readonly>
        </div>
    </div>

    <label for="email" class="mt-2">Email:</label>
    <input type="text" name="email" value="{{ $datos_expendientes->emailpersonal }}" class="form-control" readonly>

    <label for="emailge" class="mt-2">Email Gerente:</label>
    <input type="text" name="emailge" value="{{ $gerente->correo }}" class="form-control" readonly>

    <label for="nombrege" class="mt-2">Nombre Gerente:</label>
    <input type="text" name="nombrege" value="{{ $gerente->nombregerente }}" class="form-control" readonly>


    <button type="submit" class="btn btn-sm btn-primary text-bold float-right mt-3">Guardar</button>
</form>
