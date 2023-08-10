<x-datatable :list="$usuarios">

    @if (count($usuarios))
        <div class="table-responsive">

            <x-table-headers class="py-2" :sortby="$sort" :order="$direction" :headers="$headers">

                @foreach ($usuarios as $gerenciaItem)

                    <tr>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{ route('configuracion.configuracion.gerencia.show', $gerenciaItem->id) }}"> {{ $gerenciaItem->id }} </a>
                        </td>
                        <td style="vertical-align: middle;">
                            {{ $gerenciaItem->cedula }}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{ $gerenciaItem->nombre }}
                        </td>
                        <td class="text-enter" style="vertical-align: middle;">
                            {{ $gerenciaItem->usuario }}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{ route('configuracion.configuracion.gerencia.edit', $gerenciaItem->id) }}" type="button" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Editar">
                                <span class="fas fa-edit" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>

               @endforeach

            </x-table-headers>

        </div>

    @else

        <div class="px-6 py-2">
            <span>No se encontraron registros.</span>
        </div>

     @endif
</x-datatable>