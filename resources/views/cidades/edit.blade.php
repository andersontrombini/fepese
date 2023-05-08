@extends('layouts.basico')

@section('titulo', 'Cadastro cidade')

@section('conteudo')

    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>

        <div class="text-center pb-3">
            <h4>Editar cidade</h4>
        </div>
        <hr>
        <form id="edicao_cidades">
            @include('cidades._partials.form', ['estados' => $estados])
            <hr>
            <div class="text-end">
                <a href="/cidades" class="button-cancel btn mt-2">Cancelar</a>
                <button type="submit" class="button-submit btn mt-2">Editar</button>
            </div>
        </form>
    </div>
@endsection