@extends('layouts.basico')

@section('titulo', 'Inscrição')

@section('conteudo')
    <div class="container w-75 p-5">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>
        <div class="text-center pb-3">
            <h4>Inscrição de Candidato</h4>
        </div>

        <hr>
        <form id="formulario_inscricao">
            <div class="row mb-3">
                <div class="col">
                    <label for="nome" class="form-label">* Nome completo</label>
                    <input type="text" class="form-control teste" id="nome" name="nome"
                        value="{{ old('nome') }}">
                    <div class="nome-feedback clear validacao-form text-danger d-none"></div>
                </div>
                <div class="col">
                    <label for="cpf" class="form-label">* CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                    <div class="cpf-feedback clear validacao-form text-danger d-none"></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="endereco" class="form-label">* Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco">
                    <div class="endereco-feedback clear validacao-form text-danger d-none"></div>
                </div>
                <div class="col-2">
                    <label for="estado_id" class="form-label">* Estado</label>
                    <select class="form-control" name="estado_id" id="estado_id">
                        <option value=""selected disabled>Selecione</option>
                        @foreach ($estados as $estado)
                            <option data-estados="{{ $estado }}" value="{{ $estado->estado_id }}">{{ $estado->nome }}
                            </option>
                        @endforeach
                    </select>
                    <div class="estado_id-feedback clear validacao-form text-danger d-none"></div>
                </div>
                <div class="col-4">
                    <label for="cidade_id" class="form-label">* Cidade</label>
                    <select disabled class="form-control" name="cidade_id" id="cidade_id" title="Selecione o estado">
                        <option value=""selected disabled>Selecione</option>
                    </select>
                    <div class="cidade_id-feedback clear validacao-form text-danger d-none"></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="cargo" class="form-label">* Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo">
                </div>
                <div class="cargo-feedback clear validacao-form text-danger d-none"></div>
            </div>
            <hr>
            <div class="text-end">
                <button type="submit" class="button-submit btn mt-2">Salvar Inscrição</button>
            </div>
        </form>
    </div>
@endsection
