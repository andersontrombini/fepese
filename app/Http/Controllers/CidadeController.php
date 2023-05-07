<?php

namespace App\Http\Controllers;

use App\Models\Cidade;

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

}
