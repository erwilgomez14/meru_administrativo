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
                @if (count($modulo))
                    @foreach ($modulo as $moduloItem)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                <a href="{{ route('configuracion.control.modulo.show', $moduloItem->id) }}">
                                    {{ $moduloItem->id }}
                            </td>
                            <x-td>{{ $moduloItem->nombre }}</x-td>
                            <td class="text-center" style="vertical-align: middle;">
                                <span
                                    class="text-bold {{ $moduloItem->status == '1' ? 'text-success' : 'text-danger' }}">
                                    {{ $moduloItem->status == '1' ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <a href="{{ route('configuracion.control.modulo.edit', $moduloItem->id) }}"
                                    type="button" aria-label="Left Align" data-toggle="tooltip" data-placement="left"
                                    title="Editar">
                                    <span class="fas fa-edit" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>
    </div>
</div>
