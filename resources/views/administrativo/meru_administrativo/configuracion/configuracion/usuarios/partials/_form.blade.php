<x-card x-data="handler()">
    <x-slot name="header">
        <h3 class="card-title text-bold">Usuario</h3>
    </x-slot>

    <x-slot name="body">

        <div class="row col-12">
            <div class="form-group col-8 offset-1">
                <x-label for="cedula">Usuario</x-label>
                <input type="text" class="form-control-sm" name="cedula" id="cedula" placeholder="Ingrese la cédula"
                    required>
                <button class="btn btn-sm btn-primary" id="buscarBtn"><i class="fas fa-search"></i></button>

                <div id="errorContainer"></div>

            </div>

        </div>
        <div class="row">
            <div class="col">
                <div id="formularioContainer">
                </div>
            </div>

        </div>

    </x-slot>

    <x-slot name="footer">
        <x-button class="btn-dark" href="{{ route('configuracion.configuracion.usuario.index') }}" title="Volver">
            <i class="fas fa-arrow-left"></i> Volver al listado
        </x-button>

    </x-slot>

</x-card>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const buscarBtn = document.getElementById("buscarBtn");

        buscarBtn.addEventListener("click", async function(event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del botón

            // Vaciar el contenido del formularioContainer
            const formularioContainer = document.getElementById('formularioContainer');
            formularioContainer.innerHTML = '';

            const cedula = document.getElementById("cedula").value;
            const csrfToken = '{{ csrf_token() }}';

            if (!cedula) {
                // Mostrar mensaje de error en algún lugar de tu HTML
                document.getElementById("errorContainer").innerHTML = "La cédula es requerida";
                return; // No continuar si la cédula no está ingresada
            }

            if (cedula.length < 8) {
                // Mostrar mensaje de error en algún lugar de tu HTML
                document.getElementById("errorContainer").innerHTML =
                    "La cédula debe tener al menos 8 dígitos";
                return; // No continuar si la cédula tiene menos de 8 dígitos
            }

            try {
                const response = await fetch(
                    "{{ route('configuracion.configuracion.buscarUsuario', ['cedula' => '__cedula__']) }}"
                    .replace('__cedula__', cedula), {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        body: JSON.stringify({
                            cedula: cedula
                        })
                    });

                const data = await response.json();

                if (data.error) {
                    // Mostrar mensaje de error en el contenedor de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error
                    });
                } else {
                    document.getElementById("formularioContainer").innerHTML = data.formulario;
                    // Realizar acciones con la respuesta exitosa
                    // Crear un elemento de formulario
                    // const form = document.createElement('form');

                    // // Configurar los atributos del formulario
                    // form.setAttribute('method', 'POST');
                    // form.setAttribute('action',
                    //     '{{ route('configuracion.configuracion.usuario.index') }}'
                    // ); // Ruta del controlador para guardar
                    // const csrfField = document.createElement('input');
                    // csrfField.setAttribute('type', 'hidden');
                    // csrfField.setAttribute('name', '_token');
                    // csrfField.setAttribute('value', csrfToken);
                    // form.appendChild(csrfField);
                    // // Crear y agregar campos al formulario
                    // // Agregar campos al formulario
                    // const labelNombre = document.createElement('label');
                    // labelNombre.innerText = 'Nombre:';
                    // const inputNombre = document.createElement('input');
                    // inputNombre.setAttribute('type', 'text');
                    // inputNombre.setAttribute('name', 'nombre');
                    // inputNombre.setAttribute('value', data.usuarioRH.nombre);
                    // form.appendChild(labelNombre);
                    // form.appendChild(inputNombre);

                    // // Agregar más campos según tus necesidades
                    // const labelUsuario = document.createElement('label');
                    // labelUsuario.innerText = 'Usuario:';
                    // const inputUsuario = document.createElement('input');
                    // inputUsuario.setAttribute('type', 'text');
                    // inputUsuario.setAttribute('name', 'usuario');
                    // inputUsuario.setAttribute('value', data.usuarioRH.uid);
                    // form.appendChild(labelUsuario);
                    // form.appendChild(inputUsuario);

                    // // Agregar estilos a los campos (por ejemplo, usando clases de Bootstrap)
                    // labelNombre.classList.add(
                    //     'form-label'); // Agrega la clase de etiqueta de Bootstrap
                    // inputNombre.classList.add(
                    //     'form-control'); // Agrega la clase de entrada de Bootstrap
                    // labelUsuario.classList.add(
                    //     'form-label'); // Agrega la clase de etiqueta de Bootstrap
                    // inputUsuario.classList.add(
                    //     'form-control');


                    // // Crear y agregar botón de envío al formulario
                    // const submitButton = document.createElement('button');
                    // submitButton.setAttribute('type', 'submit');
                    // submitButton.innerText = 'Guardar';
                    // form.appendChild(submitButton);
                    // // Agregar el formulario al DOM (donde quieras mostrarlo)
                    // // Supongamos que tienes un contenedor con id "formularioContainer"
                    // const formularioContainer = document.getElementById('formularioContainer');
                    // formularioContainer.innerHTML = ''; // Limpiar contenido anterior
                    // formularioContainer.appendChild(form);
                }
            } catch (error) {
                console.error("Error en la petición:", error);
            }
        });
    });
</script>
