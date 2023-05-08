<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PessoaFisica;

class PessoaFisicaController extends Controller
{
   
    public function __construct(){}

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required',
			    'cpf' => 'required|unique:pessoa_fisica,cpf|min:11',
			    'endereco' => 'required',
			    'cidade_id' => 'required',
			    'estado_id' => 'required',
            ],
            [
                'cidade_id.required' => 'O campo cidade é obrigatório',
                'estado_id.required' => 'O campo estado é obrigatório',
            ]
        );
        
	    $pessoa = new PessoaFisica();
	    $pessoa->nome = $request->nome;
	    $pessoa->cpf = $request->cpf;
	    $pessoa->endereco = $request->endereco;
	    $pessoa->cidade_id = $request->cidade_id;
	    $pessoa->estado_id = $request->estado_id;
        $cargo = $request->cargo;
	    
        PessoaFisica::createPessoaFisica($pessoa);
        return response()->json([
            'pessoa' => $pessoa,
            'cargo' => $cargo
        ]);
    }
    
    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'id' => 'required',
                'nome' => 'required',
			    'cpf' => 'required',
			    'endereco' => 'required',
			    'cidade_id' => 'required',
			    'estado_id' => 'required',
            ]
        );
        
	    $pessoa = PessoaFisica::find($request->id);
	    $pessoa->nome = $request->nome;
	    $pessoa->cpf = $request->cpf;
	    $pessoa->endereco = $request->endereco;
	    $pessoa->cidade_id = $request->cidade_id;
	    $pessoa->estado_id = $request->estado_id;
	    
        return json_encode(PessoaFisica::updatePessoaFisica($pessoa));
    }

    public function index(Request $request)
    {
    	$this->validate(
            $request,
            [
                'nome' => 'nullable'
            ]
        );
        
        if(null != $request->nome){
        	$result = PessoaFisica::where('nome', $request->nome)->orderBy('nome')->get();
        	return json_encode($result);
        }
        
        return json_encode(PessoaFisica::orderBy('nome')->get());
    }

    public function show(Request $request, $id)
    {
        return json_encode(PessoaFisica::loadPessoaFisicaById($id));
    }


    public function destroy(Request $request, $id)
    {
        $pessoa = PessoaFisica::find($id);
	    
        return json_encode(PessoaFisica::deletePessoaFisica($pessoa));
    }

}
