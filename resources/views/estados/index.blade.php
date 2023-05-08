@extends('layouts.basico')

@section('titulo', 'Estados')

@section('conteudo')
    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>

        <div class="text-center pb-3">
            <h4>Lista de estados</h4>
        </div>
        <div class="text-end">
            <a href="/estados/create" class="btn btn-secondary">Novo estado</a>
        </div>
        <hr>
        @if (count($estados) > 0)
        <div class="table-responsive">
            <table class="table table table-striped tabela_cidades">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th width="10%">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estados as $estado)
                        <tr>
                            <th>{{ $estado->nome }}</th>
                            <td>
                                <a href="/editar_cidade/<?php echo $estado->estado_id; ?>">
                                    <box-icon type='solid' name='edit' title="editar"></box-icon></a>
                                <a href="#">
                                    <box-icon type='solid' name='trash' title="excluir" 
                                        class="deletar_estado" data-id={{ $estado->estado_id}}></box-icon></a>
                            </td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="text-center">
                <span>Nenhum estado cadastrado! </span>
                <a href="/estados/create">Clique aqui</a> para criar
            </div>
        @endif
    </div>
@endsection

