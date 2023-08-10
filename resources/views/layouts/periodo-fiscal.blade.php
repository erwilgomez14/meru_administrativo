<div class="text-center">
    <form id="periodo-form" action="{{ route('configuracion.control.registrocontrol.periodo_actual') }}" method="POST"
    style="font-size:12px !important;">
        @csrf
        <select name="ano_pro" id="ano_pro" class="form-control form-control-sm" style="height:35px;" onchange="$('#periodo-form').submit();" {{ $periodos->count() == 1 ? 'disabled' : '' }}>
            <option value="" @selected(empty(session('ano_pro')) && $periodos->count() > 1)>Seleccione...</option>

            @foreach($periodos as $periodo)
                <option value="{{ $periodo }}" @selected($periodo == session('ano_pro'))>{{ $periodo }}</option>
            @endforeach
        </select>
    </form>
</div>
