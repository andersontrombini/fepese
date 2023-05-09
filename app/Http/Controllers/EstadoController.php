<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Retorno listagem para inserção em select-box
     * de estados
     * @return \Illuminate\Http\Response
     */
    public function listar(Request $request)
    {
        $estados = Estado::orderBy('nome')->get();

        if (!$estados) {
            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao listar os estados.',
            ], 404);
        }

        return response()->json($estados);
    }

    /**
     * Cadastrar novo estado
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
			    'nome' => 'required:min2|unique:estado,nome',
			    'sigla' => 'required|min:2',
			    'cidade_id' => 'required|numeric',
            ]
        );
        
	    $estado = new Estado();
	    $estado->nome = $request->nome;
	    $estado->sigla = $request->sigla;
	    $estado->cidade_id = $request->cidade_id;
	    
        Estado::createCidade($estado);
        
        return response()->json($estado);
    }

    /**
     * Atualizar estado
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $this->validate(
            $request,
            [
            	'nome' => 'required:min2|unique:estado,nome',
			    'sigla' => 'required|min:2',
			    'cidade_id' => 'required|numeric',
            ]
        );
        
	    $estado = Estado::find($id);
        $estado->nome = $request->nome;
	    $estado->sigla = $request->sigla;
	    $estado->cidade_id = $request->cidade_id; 
        $estado->update();
        
        return response()->json($estado);
    }

    /**
     * Excluir estado
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao excluir o estado.',
            ], 404);
        }
        $estado->delete();

        return response()->json([
            'success' => true,
            'message' => 'Estado excluído com sucesso.',
        ]);
    }
}
