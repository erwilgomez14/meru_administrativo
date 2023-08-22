<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th>{{ $header['name'] }}</th>s
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @if (count($usuarios))
                    @foreach ($usuarios as $gerenciaItem)
                        <tr>

                            <td class="text-center" style="vertical-align: middle;">
                                <a href="{{ route('configuracion.configuracion.gerencia.show', $gerenciaItem->id) }}">
                                    {{ $gerenciaItem->id }} </a>
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
                                <label class="switch s-icons s-outline  s-outline-danger toggle-anofiscal"
                                    data-id="{{ $gerenciaItem->id }}" data-anofiscal="{{ $gerenciaItem->anofiscal }}">
                                    <input type="checkbox" {{ $gerenciaItem->ano_fiscal === '1' ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <label class="switch s-icons s-outline  s-outline-primary mr-2 toggle-status"
                                    data-id="{{ $gerenciaItem->id }}" data-status="{{ $gerenciaItem->status }}">
                                    <input type="checkbox" {{ $gerenciaItem->status === '1' ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>
    </div>
</div>
