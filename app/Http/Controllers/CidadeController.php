<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Retorno listagem para inserção em select-box
     * de acordo com estado selecionado.
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function listar(int $id)
    {
        $cidades = Cidade::where('estado_id', $id)->get();

        if (!$cidades) {
            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao listar as cidades.',
            ], 404);
        }
        return response()->json($cidades);
    }

    /**
     * Cadastrar nova cidade
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required|min:3|unique:cidade,nome',
                'estado_id' => 'required|numeric',
            ]
        );

        $cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->estado_id = $request->estado_id;

        Cidade::createCidade($cidade);

        return response()->json($cidade);
    }

    /**
     * Atualizar cidade
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
                'nome' => 'required|min:3|unique:cidade,nome',
                'estado_id' => 'required|numeric',
            ]
        );

        $cidade = Cidade::find($id);
        $cidade->nome = $request->nome;
        $cidade->estado_id = $request->estado_id;
        $cidade->update();

        return response()->json($cidade);
    }

    /**
     * Excluir cidade
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $cidade = Cidade::find($id);

        if (!$cidade) {
            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao excluir a cidade.',
            ], 404);
        }
        $cidade->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cidade excluída com sucesso.',
        ]);
    }
}
