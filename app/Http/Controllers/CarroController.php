<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarroController extends Controller
{
    public function index()
    {
        // Recupera todos os carros e seus respectivos proprietários
        $carros = Carro::with('proprietario')->get();

        return response()->json($carros);
    }
    public function store(Request $request)
    {
        try {
            // Validação dos dados recebidos
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required',
                'placa' => 'required',
                'id_proprietario' => 'required|exists:proprietarios,id',
            ]);
    
            // Criação do novo carro
            $carro = Carro::create($request->all());
    
            return response()->json($carro, 201);
        } catch (\Exception $e) {
            // Lidar com o erro de criação do carro
            return response()->json(['error' => 'Erro ao criar o carro'], 500);
        }
    }

    public function show($id)
    {
        // Recupera o carro pelo ID e seu respectivo proprietário
        $carro = Carro::with('proprietario')->find($id);

        if (!$carro) {
            return response()->json(['message' => 'Carro não encontrado'], 404);
        }

        return response()->json($carro);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'placa' => 'required',
            'id_proprietario' => 'required|exists:proprietarios,id',
        ]);

        // Atualização do carro
        $carro = Carro::find($id);

        if (!$carro) {
            return response()->json(['message' => 'Carro não encontrado'], 404);
        }

        $carro->update($request->all());

        return response()->json($carro);
    }

    public function destroy($id)
    {
        // Exclusão do carro
        $carro = Carro::find($id);

        if (!$carro) {
            return response()->json(['message' => 'Carro não encontrado'], 404);
        }

        $carro->delete();

        return response()->json(['message' => 'Carro excluído com sucesso']);
    }
}
