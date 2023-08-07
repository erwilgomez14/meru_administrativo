<x-card x-data="handler()">
    <x-slot name="header">
        <h3 class="card-title text-bold">Gerencia</h3>
    </x-slot>

    <x-slot name="body">

        <div class="row col-12">
            <div class="form-group col-8 offset-1">
                <x-label for="gerencia">Usuario</x-label>
                {{-- <x-input class="form-control-sm {{ $errors->has('gerencia') ? 'is-invalid' : '' }}" name="gerencia" value="{{ old('gerencia', $gerencia->des_ger) }}" maxlength="500" required/> --}}
                <input type="text" class="form-control-sm" name="cedula" id="cedula" placeholder="Ingrese la cédula">
                <a class="btn btn-sm btn-primary" onclick="buscarPorCedula()"><i
                        class="fas fa-search"></i></a>


            </div>
        </div>



    </x-slot>

    <x-slot name="footer">
        <button type="submit" class="btn btn-sm btn-primary text-bold float-right">Guardar</button>
    </x-slot>

</x-card>

<script type="text/javascript">
    function buscarPorCedula() {
        const cedula = document.getElementById('cedula').value;

        // Realizar la petición Ajax utilizando Axios
        axios.get(`/buscarPorCedula/${cedula}`)
            .then(response => {
                // Manejar la respuesta y actualizar los resultados en la tabla
                Livewire.emit('actualizarResultados', response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>
