@extends('layouts.basico')

@section('titulo', 'Cadastro estado')

@section('conteudo')

    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>

        <div class="text-center pb-3">
            <h4>Editar estado</h4>
        </div>
        <hr>
        <form id="edicao_estados">
            @include('estados._partials.form')
            <hr>
            <div class="text-end">
                <a href="/estados" class="button-cancel btn mt-2">Cancelar</a>
                <button type="submit" class="button-submit btn mt-2">Editar</button>
            </div>
        </form>
    </div>
@endsection