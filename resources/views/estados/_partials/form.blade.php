<input type="hidden" id="id" value="{{ isset($estado) ? $estado->estado_id : '' }}">
<div class="row">
    <div class="col">
        <label class="form-label" for="nome">Nome</label>
        <input class="form-control" type="text" id="nome" name="nome"
            value="{{ isset($estado) ? $estado->nome : '' }}">
        <div class="nome-feedback clear validacao-form text-danger d-none"></div>
    </div>
    <div class="col">
        <label class="form-label" for="estado">Estado</label>
        <select class="form-control" name="estado_id" id="estado_id">
            <option value="" selected disabled>Selecione</option>
            {{-- @isset($estados)
                @foreach ($estados as $_estado)
                    <option value="{{ $_estado->estado_id }}" {!! isset($estado) ? ($_estado->estado_id == $estado->estado_id ? 'selected' : '') : '' !!}>
                        {{ $_estado->nome }}
                    </option>
                @endforeach
            @endisset --}}
        </select>
        <div class="estado_id-feedback clear validacao-form text-danger d-none"></div>
    </div>
    <div class="col">
        <label class="form-label" for="sigla">Silga</label>
        <input class="form-control" type="text" id="sigla" name="sigla"
            value="{{ isset($estado) ? $estado->nome : '' }}">
        <div class="sigla-feedback clear validacao-form text-danger d-none"></div>
    </div>
</div>
