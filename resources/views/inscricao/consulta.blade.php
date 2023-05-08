@extends('layouts.basico')

@section('titulo', 'Consultar inscrição')

@section('conteudo')
    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>
        <div class="text-center pb-3">
            <h4>Consultar inscrição</h4>
        </div>

        <hr>
        <form id="consulta">
            <div class="d-flex justify-content-center">
                <div class="col-6 no-print">
                    <label for="cpf_consulta" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf_consulta" name="cpf">
                </div>
            </div>
            <div class="text-center no-print">
                <button type="submit" class="button-submit btn mt-2 mb-3">Consultar</button>
            </div>
        <form>
            <div class="text-end no-print d-none" id="impressao">
                <a href="#" onclick="window.print()" title="Imprimir">
                    <box-icon name="printer"></box-icon>
                </a>
            </div>
            <div id="resultado"></div>
    <div>
@endsection

