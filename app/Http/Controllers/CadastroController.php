<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Inscricao;
use App\Models\PessoaFisica;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscricoes = Inscricao::all();

        return view('inscricao.index', compact('inscricoes'));
    }

    public function ver()
    {
        return view('inscricao.consulta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::with('cidades')->get();
        return view('inscricao.cadastro', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = PessoaFisica::with('inscricao')->find($id);
        $cidades = Cidade::all();
        $estados = Estado::all();
        return view('inscricao.comprovante', compact('pessoa', 'cidades', 'estados'));
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
