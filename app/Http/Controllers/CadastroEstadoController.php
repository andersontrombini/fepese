<?php

namespace App\Http\Controllers;

use App\Models\Estado;

class CadastroEstadoController extends Controller
{
    /**
     *listagem de estados
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::all();
        if(!$estados){
            return response()->json([
                'error' => true,
                'message' => 'Nenhum estado encontrado.'
            ]);
        }
        return view('estados.index', compact('estados'));
    }

    /**
     * Cadastro de estado.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.cadastro');
    }

    /**
     * Edição de estado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);

        return view('estados.edit', compact('estado'));
    }
}
