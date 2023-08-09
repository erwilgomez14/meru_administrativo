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
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th class="no-content"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td>
                </tr>
 
            </tbody>

        </table>
    </div>
</div>