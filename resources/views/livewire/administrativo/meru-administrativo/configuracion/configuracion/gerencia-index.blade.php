{{--<x-datatable :list="$gerencias">

    @if (count($gerencias))
        <div class="table-responsive">

            <x-table-headers class="py-2" :sortby="$sort" :order="$direction" :headers="$headers">

                @foreach ($gerencias as $gerenciaItem)

                    <tr>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{ route('configuracion.configuracion.gerencia.show', $gerenciaItem->cod_ger) }}"> {{ $gerenciaItem->cod_ger }} </a>
                        </td>
                        <td style="vertical-align: middle;">
                            {{ $gerenciaItem->des_ger }}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{ $gerenciaItem->centro_costo }}
                        </td>
                        <td class="text-enter" style="vertical-align: middle;">
                            {{ $gerenciaItem->nom_jefe }}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            {{ $gerenciaItem->nomenclatura }}
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{ route('configuracion.configuracion.gerencia.edit', $gerenciaItem->cod_ger) }}" type="button" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Editar">
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
</x-datatable>--}}

<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th>{{ $header['name'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @if (count($gerencias))
                    @foreach ($gerencias as $gerenciaItem)
                <tr>
                    <td class="text-center" style="vertical-align: middle;">
                        <a href="{{ route('configuracion.configuracion.gerencia.show', $gerenciaItem->cod_ger) }}"> {{ $gerenciaItem->cod_ger }} </a>
                    </td>
                    <td style="vertical-align: middle;">
                        {{ $gerenciaItem->des_ger }}
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        {{ $gerenciaItem->centro_costo }}
                    </td>
                    <td class="text-enter" style="vertical-align: middle;">
                        {{ $gerenciaItem->nom_jefe }}
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        {{ $gerenciaItem->nomenclatura }}
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        
                        <a href="{{ route('configuracion.configuracion.gerencia.edit', $gerenciaItem->cod_ger) }}" class="mt-2 edit-profile"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                               
                    </td>  
                </tr>
                    @endforeach
                @endif
            </tbody>

        </table>
    </div>
</div>