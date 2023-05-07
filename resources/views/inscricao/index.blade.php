@extends('layouts.basico')

@section('titulo', 'Inscrição')

@section('conteudo')
    <div class="container pt-3">
        <div class="text-center m-4 pb-2">
            <h2 class="title">Concurso Público para Desenvolvedor de Software</h2>
        </div>

        <div class="text-center pb-3">
            <h4>Inscrições ativas</h4>
        </div>
        <hr>
        @if (count($inscricoes) > 0)
            <table class="table table table-striped tabela_inscricoes">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Localidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscricoes as $incricao)
                        <tr>
                            <th>{{ $incricao->id }}</th>
                            <td>{{ $incricao->cargo }}</td>
                            <td>{{ $incricao->pessoa->nome }}</td>
                            <td>{{ $incricao->pessoa->cidade->nome . '-' . $incricao->pessoa->estado->sigla }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <span>Nenhuma inscrição realizada! </span>
                <a href="/cadastro">Clique aqui</a> para novo cadastro
            </div>
        @endif
    </div>
@endsection
