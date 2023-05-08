<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Retorno listagem para inserção em select-box
     * de acordo com estado selecionado.
     * @return \Illuminate\Http\Response
     */
    public function listar($id)
    {
        $cidades = Cidade::where('estado_id', $id)->get();

        if(!$cidades){
            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao listar as cidades.',
            ],404);
        }
        return response()->json($cidades);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
			    'nome' => 'required',
			    'estado_id' => 'required',
            ]
        );
        
	    $cidade = new Cidade();
	    $cidade->nome = $request->nome;
	    $cidade->estado_id = $request->estado_id;
	    
        Cidade::createCidade($cidade);
        
        return response()->json($cidade);
    }

    public function update(Request $request, int $id)
    {
 
        $this->validate(
            $request,
            [
            	'nome' => 'required',
			    'estado_id' => 'required',
            ]
        );
        
	    $cidade = Cidade::find($id);
	    $cidade->nome = $request->nome;
	    $cidade->estado_id = $request->estado_id;  
        $cidade->update();
        
        return response()->json($cidade);
    }

    public function destroy(Request $request, int $id)
    {
   
	    $cidade = Cidade::find($id);
        $cidade->delete();
        
        return response()->json($cidade);
    }

}
