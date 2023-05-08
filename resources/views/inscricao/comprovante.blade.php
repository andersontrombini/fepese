@extends('layouts.basico')

@section('titulo', 'Inscrição')

@section('conteudo')
    <div class="container pt-3">
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
        @include('inscricao._partials.form_comprovante', ["pessoa" => $pessoa])
        <div class="row text-end no-print">
            <div class="col text-end">
                <a href="/cadastro">Retornar para inscrição</a>
            </div>
        </div>
    </div>
@endsection

