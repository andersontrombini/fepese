<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($id)
    {
        $cidades = Cidade::where('estado_id', $id)->get();
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

}
