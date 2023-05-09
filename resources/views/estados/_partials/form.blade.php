<input type="hidden" id="id" value="{{ isset($estado) ? $estado->estado_id : '' }}">
<div class="row">
    <div class="col">
        <label class="form-label" for="nome">Nome</label>
        <input class="form-control" type="text" id="nome" name="nome" required pattern=".{3,}"
            title="Por favor, insira pelo menos 3 caracteres." value="{{ isset($estado) ? $estado->nome : '' }}">
        <div class="nome-feedback clear validacao-form text-danger d-none"></div>
    </div>
    <div class="col">
        <label class="form-label" for="sigla">Sigla</label>
        <input class="form-control" type="text" id="sigla" name="sigla"
            value="{{ isset($estado) ? $estado->sigla : '' }}" pattern="^[a-zA-Z]{2,}$" required
            title="Por favor, insira pelo menos 2 caracteres">
        <div class="sigla-feedback clear validacao-form text-danger d-none"></div>
    </div>
</div>
