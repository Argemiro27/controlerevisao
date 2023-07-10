<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProprietarioController extends Controller
{
    public function index()
    {
        // Recupera todos os proprietários
        $proprietarios = Proprietario::all();
    
        return response()->json($proprietarios);
    }

    public function store(Request $request)
    {
        try {
            // Validação dos dados recebidos
            $request->validate([
                'nome' => 'required',
                'email' => 'required',
                'telefone' => 'required',
                'idade' => 'required',
                'sexo' => 'required',
            ]);
    
            // Criação do novo proprietário
            $proprietario = Proprietario::create($request->all());
    
            return response()->json($proprietario, 201);
        } catch (\Exception $e) {
            // Lidar com o erro de criação do proprietário
            return response()->json(['error' => 'Erro ao criar o proprietário'], 500);
        }
    }

    public function show($id)
    {
        // Recupera o proprietario pelo ID e seu respectivo proprietário
        $proprietario = Proprietario::with('usuario')->find($id);

        if (!$proprietario) {
            return response()->json(['message' => 'Proprietario não encontrado'], 404);
        }

        return response()->json($proprietario);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
        ]);

        // Atualização do proprietario
        $proprietario = Proprietario::find($id);

        if (!$proprietario) {
            return response()->json(['message' => 'Proprietario não encontrado'], 404);
        }

        $proprietario->update($request->all());

        return response()->json($proprietario);
    }

    public function destroy($id)
    {
        // Exclusão do proprietario
        $proprietario = Proprietario::find($id);

        if (!$proprietario) {
            return response()->json(['message' => 'Proprietario não encontrado'], 404);
        }

        $proprietario->delete();

        return response()->json(['message' => 'Proprietario excluído com sucesso']);
    }
}
