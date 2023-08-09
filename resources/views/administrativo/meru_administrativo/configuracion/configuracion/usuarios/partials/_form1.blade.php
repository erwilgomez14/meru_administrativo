<form method="POST" action="{{ route('configuracion.configuracion.usuario.index') }}">
    @csrf
    <!-- Agrega aquí tus campos de formulario -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $userRH->nombre }}" class="form-control" readonly>

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

    <label for="telefono" class="mt-2">Telefono:</label>
    <input type="text" name="telefono" value="{{ $expediente->telefono }}" class="form-control" readonly>


    <button type="submit" class="btn btn-sm btn-primary text-bold float-right mt-3">Guardar</button>
</form>
