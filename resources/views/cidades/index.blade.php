@extends('layouts.basico')

@section('titulo', 'Cidades')

@section('conteudo')
    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>

        <div class="text-center pb-3">
            <h4>Lista de cidades</h4>
        </div>
        <div class="text-end">
            <a href="/cidades/create" class="btn btn-secondary">Nova cidade</a>
        </div>
        <hr>
            <table class="table table table-striped tabela_cidades">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th width="15%">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cidades as $cidade)
                        <tr>
                            <th>{{ $cidade->nome }}</th>
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
