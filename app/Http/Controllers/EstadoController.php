<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar(Request $request)
    {
        $this->validate(
            $request,
            [
			    'nome' => 'nullable'
            ]
        );
        
        if(null != $request->nome){
        	$result = Estado::orderBy('nome')->get();
        	return $result;
        }

        return Estado::orderBy('nome')->get();
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
			    'nome' => 'required',
			    'cidade_id' => 'required',
            ]
        );
        
	    $cidade = new Estado();
	    $cidade->nome = $request->nome;
	    $cidade->estado_id = $request->estado_id;
	    
        Estado::createCidade($cidade);
        
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
        
	    $cidade = Estado::find($id);
	    $cidade->nome = $request->nome;
	    $cidade->estado_id = $request->estado_id;  
        $cidade->update();
        
        return response()->json($cidade);
    }

    public function destroy(Request $request, int $id)
    {
   
	    $cidade = Estado::find($id);
        $cidade->delete();
        
        return response()->json($cidade);
    }
}
