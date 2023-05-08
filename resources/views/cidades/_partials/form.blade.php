<input type="hidden" id="id" value="{{ isset($cidade) ? $cidade->cidade_id : '' }}">
<div class="row">
    <div class="col">
        <label class="form-label" for="nome">Nome</label>
        <input class="form-control" type="text" id="nome" name="nome"
        value="{{ isset($cidade) ? $cidade->nome : '' }}">
        <div class="nome-feedback clear validacao-form text-danger d-none"></div>
    </div>
    <div class="col">
        <label class="form-label" for="estado">Estado</label>
        <select class="form-control" name="estado_id" id="estado_id">
            <option value="" selected disabled>Selecione</option>
            @foreach ($estados as $estado)
                    <option value="{{ $estado->estado_id }}" {!! isset($cidade) ? ($cidade->estado_id == $estado->estado_id ? 'selected' : '') : '' !!}>
                        {{ $estado->nome }}
                    </option>
                @endforeach
        </select>
        <div class="estado_id-feedback clear validacao-form text-danger d-none"></div>
    </div>
</div>
