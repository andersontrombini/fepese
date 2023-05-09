<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Inscricao;
use App\Models\PessoaFisica;

class CadastroController extends Controller
{
    /**
     * listagem de inscriçoes
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscricoes = Inscricao::all();
        if(!$inscricoes){
            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao listar as inscrições ativas.',
            ], 404);
        }
        return view('inscricao.index', compact('inscricoes'));
    }

    /**
     * Exibe view para consulta de inscrição
     * @return void
     */
    public function ver()
    {
        return view('inscricao.consulta');
    }

    /**
     * Cadastro
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::with('cidades')->get();
        if(!$estados){
            return response()->json([
                'error' => true,
                'message' => 'Nenhum estado encontrado.',
            ], 404);
        }
        return view('inscricao.cadastro', compact('estados'));
    }

    /**
     * Exibe dados do candidato na consulta de inscrição.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pessoa = PessoaFisica::with('inscricao')->find($id);
        // if(!$pessoa){
        //     return response()->json([
        //         'error' => true,
        //         'message' => 'Cadastro encontrado.',
        //     ], 404);
        // }
        // $cidades = Cidade::all();
        // $estados = Estado::all();
        // return view('inscricao.comprovante', compact('pessoa', 'cidades', 'estados'));
    }

    /**
     * Exibe dados do candidato na consulta de inscrição.
     * @param string $cpf
     * @return void
     */
    public function consultar($cpf)
    {
        $pessoa = PessoaFisica::with('inscricao')->where('cpf', $cpf)->first();
        if(!$pessoa){
            return response()->json([
                'success' => false,
                'message' => 'Cadastro não encontrado.'
            ],404);
        }
        $cidades = Cidade::all();
        $estados = Estado::all();
        return view('inscricao._partials.form_comprovante', compact('pessoa', 'cidades', 'estados'));
    }

    /**
     * Durante cadastro verifica se documento informado já esta em uso.
     *
     * @param [type] $cpf
     * @return void
     */
    public function consultarCpf($cpf)
    {
        $pessoa = PessoaFisica::where('cpf', $cpf)->first();

        if(!$pessoa){
            return response()->json([
                'success' => true,
                'message' => 'Documento livre para cadastro'
            ],200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cliente já possui cadastro.'
        ],404);
    
    }
}

