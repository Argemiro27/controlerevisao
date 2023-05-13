<?php

namespace App\Http\Controllers;

use App\Models\VariaProduto;
use App\Models\TiposVariacao;
use Illuminate\Http\Request;

class VariaProdutoController extends Controller
{
    public function index()
    {
        $variaProduto = VariaProduto::with('produto')->get();
        return view('varia_produto.index', ['variaProduto' => $variaProduto]);
    }

    public function create()
    {
        return view('varia_produto.create');
    }

    public function store(Request $request)
    {
        $variaProduto = new VariaProduto;
        $variaProduto->id_produto = $request->id_produto;
        $variaProduto->id_variacao = $request->id_variacao;
        $tipoVariacaoNome = $request->input('tipo_variacao');
        $tipoVariacao = TiposVariacao::where('nome', $tipoVariacaoNome)->first();
        $tipoVariacaoId = $tipoVariacao->id;
        $variaProduto->tiposvariacao_id = $tipoVariacaoId;
        $variaProduto->save();
        return redirect()->route('varia_produto.edit', ['variaProduto' => $variaProduto]);
    }

    public function edit(VariaProduto $variaProduto)
    {
        return view('varia_produto.edit', ['variaProduto' => $variaProduto]);
    }

    public function update(Request $request, VariaProduto $variaProduto)
    {
        $variaProduto->id_produto = $request->id_produto;
        $variaProduto->id_variacao = $request->id_variacao;
        $variaProduto->tipovariacao_id = $request->tipovariacao_id;
        $variaProduto->save();
        return redirect()->route('varia_produto.index');
    }
    public function destroy(VariaProduto $variaProduto)
    {
        $variaProduto->delete();
        return redirect()->route('varia_produto.index');
    }
}
