@extends('layouts.basico')

@section('titulo', 'Inscrição')

@section('conteudo')
    <div class="container w-75 p-5">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>
        <div class="text-center pb-2">
            <h4>Comprovante de Inscrição</h4>
            <div class="text-end no-print">
                <a href="#" onclick="window.print()" title="Imprimir">
                    <box-icon name="printer"></box-icon>
                </a>
            </div>
        </div>

        <hr>
        <form id="formulario_inscricao">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="inscricao" class="form-label">Inscrição</label>
                    <input disabled type="text" class="form-control" id="inscricao"
                        value="{{ isset($pessoa) ? $pessoa->inscricao->id : '' }}">
                </div>
                <div class="col-3">
                    <label for="situacao" class="form-label">Situação</label>
                    <input disabled type="text" class="form-control" id="situacao"
                        value="{{ isset($pessoa) ? $pessoa->inscricao->situacao : '' }}">
                </div>
                <div class="col-3">
                    <label for="data" class="form-label">Data Inscrição</label>
                    <input disabled type="text" class="form-control" id="data"
                        value="{{ isset($pessoa) ? date('d/m/Y H:i:s', strtotime($pessoa->inscricao->created_at)) : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nome" class="form-label">* Nome completo</label>
                    <input disabled type="text" class="form-control" id="nome" name="nome"
                        value="{{ isset($pessoa) ? $pessoa->nome : '' }}">
                </div>
                <div class="col">
                    <label for="cpf" class="form-label">* CPF</label>
                    <input disabled type="text" class="form-control" id="cpf" name="cpf"
                        value="{{ isset($pessoa)
                            ? ($cpf_formatado =
                                substr($pessoa->cpf, 0, 3) .
                                '.' .
                                substr($pessoa->cpf, 3, 3) .
                                '.' .
                                substr($pessoa->cpf, 6, 3) .
                                '-' .
                                substr($pessoa->cpf, 9, 2))
                            : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="endereco" class="form-label">* Endereço</label>
                    <input disabled type="text" class="form-control" id="endereco" name="endereco"
                        value="{{ isset($pessoa) ? $pessoa->endereco : '' }}">
                </div>
                <div class="col-4">
                    <label for="cidade_id" class="form-label">Cidade</label>
                    <select disabled class="form-control" name="cidade_id" id="cidade_id">
                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}" {!! isset($pessoa) ? ($pessoa->cidade->id == $cidade->id ? 'selected' : '') : '' !!}>
                                {{ $cidade->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <label for="estado_id" class="form-label">Estado</label>
                    <select disabled class="form-control" name="estado_id" id="cidaestado_idde_id">
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}" {!! isset($pessoa) ? ($pessoa->estado->id == $estado->id ? 'selected' : '') : '' !!}>
                                {{ $estado->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="cargo" class="form-label">* Cargo</label>
                    <input disabled type="text" class="form-control" id="cargo" name="cargo"
                        value="{{ isset($pessoa) ? $pessoa->inscricao->cargo : '' }}">
                </div>
            </div>
            <hr>
            <div class="row text-end no-print">
                <div class="col text-end">
                    <a href="/cadastro">Retornar para inscrição</a>
                </div>
            </div>
        </form>

    </div>

@endsection
