<?php

namespace App\Http\Controllers;

use App\Models\Revisao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RevisaoController extends Controller
{
    public function index()
    {
        // Recupera todas as revisões e seus respectivos carros e proprietários
        $revisoes = Revisao::with('carro.proprietario')->get();

        return response()->json($revisoes);
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'data' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'id_carro' => 'required|exists:carros,id',
        ]);

        // Criação da nova revisão
        $revisao = Revisao::create($request->all());

        return response()->json($revisao, 201);
    }

    public function show($id)
    {
        // Recupera a revisão pelo ID e seu respectivo carro e proprietário
        $revisao = Revisao::with('carro.proprietario')->find($id);

        if (!$revisao) {
            return response()->json(['message' => 'Revisão não encontrada'], 404);
        }

        return response()->json($revisao);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'data' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'id_carro' => 'required|exists:carros,id',
        ]);

        // Atualização da revisão
        $revisao = Revisao::find($id);

        if (!$revisao) {
            return response()->json(['message' => 'Revisão não encontrada'], 404);
        }

        $revisao->update($request->all());

        return response()->json($revisao);
    }

    public function destroy($id)
    {
        // Exclusão da revisão
        $revisao = Revisao::find($id);

        if (!$revisao) {
            return response()->json(['message' => 'Revisão não encontrada'], 404);
        }

        $revisao->delete();

        return response()->json(['message' => 'Revisão excluída com sucesso']);
    }
}
