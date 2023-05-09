<input type="hidden" id="id" value="{{ isset($cidade) ? $cidade->cidade_id : '' }}">
<div class="row">
    <div class="col">
        <label class="form-label" for="nome">Nome</label>
        <input class="form-control" type="text" id="nome" name="nome"
            value="{{ isset($cidade) ? $cidade->nome : '' }}" required pattern=".{3,}"
            title="Por favor, insira pelo menos 3 caracteres.">
        <div class="nome-feedback clear validacao-form text-danger d-none"></div>
    </div>
    @if ($formMode == 'edit')
        <div class="col">
            <label class="form-label" for="estado">Estado</label>
            <select class="form-control" name="estado_id" id="estado_edit" required>
                <option value="" selected disabled>Selecione</option>
                @isset($estados)
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->estado_id }}" {!! isset($cidade) ? ($cidade->estado_id == $estado->estado_id ? 'selected' : '') : '' !!}>
                            {{ $estado->nome }}
                        </option>
                    @endforeach
                @endisset
            </select>
            <div class="estado_id-feedback clear validacao-form text-danger d-none"></div>
        </div>
    @else
        <div class="col">
            <label class="form-label" for="estado">Estado</label>
            <select class="form-control" name="estado_id" id="estado_id" required>
                <option value="" selected disabled>Selecione</option>
            </select>
            <div class="estado_id-feedback clear validacao-form text-danger d-none"></div>
        </div>
    @endif
</div>
