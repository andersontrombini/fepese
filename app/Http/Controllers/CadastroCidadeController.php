<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;

class CadastroCidadeController extends Controller
{
    /**
     * listagem de cidades
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::all();
        if(!$cidades){
            return response()->json([
                'error' => true,
                'message' => 'Nenhuma cidade encontrada.'
            ]);
        }
        return view('cidades.index', compact('cidades'));
    }

    /**
     * Cadastro de cidade.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formMode = 'create';
        return view('cidades.cadastro', compact('formMode'));
    }

    /**
     * Edição de cidade
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        if(!$cidade){
            return response()->json([
                'error' => true,
                'message' => 'Cidade não encontrada.'
            ]);
        }
        $estados = Estado::all();
        $formMode = 'edit';

        return view('cidades.edit', compact('cidade', 'estados', 'formMode'));
    }
}

