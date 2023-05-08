@extends('layouts.basico')

@section('titulo', 'Cidades')

@section('conteudo')
    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>

        <div class="text-center pb-3">
            <h4>Lista de estados</h4>
        </div>
        <div class="text-end">
            <button class="btn btn-secondary">Novo estado</button>
        </div>
        <hr>
            <table class="table table table-striped tabela_estados">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th width="15%">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estados as $estado)
                        <tr>
                            <th>{{ $estado->nome }}</th>
                            <td>
                                <a href="#">Editar</a>
                                <a href="#">Excluir</a>
                            </td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
