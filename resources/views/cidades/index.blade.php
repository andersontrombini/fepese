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
        <div class="table-responsive">
            <table class="table table table-striped tabela_cidades">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th width="10%">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cidades as $cidade)
                        <tr>
                            <th>{{ $cidade->nome }}</th>
                            <td>
                                <a href="/editar_cidade/<?php echo $cidade->cidade_id; ?>">
                                    <box-icon type='solid' name='edit' title="editar"></box-icon></a>
                                <a href="#">
                                    <box-icon type='solid' name='trash' title="excluir" 
                                        class="deletar_cidade" data-id={{ $cidade->cidade_id}}></box-icon></a>
                            </td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

