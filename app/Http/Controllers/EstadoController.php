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
}
