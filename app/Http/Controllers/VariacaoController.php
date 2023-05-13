<?php

namespace App\Http\Controllers;
use App\Models\Variacao;
use App\Models\TiposVariacao;
use Illuminate\Http\Request;

class VariacaoController extends Controller
{
    public function index()
    {
        $variacao = Variacao::all();
        return view('variacao.index', ['variacao' => $variacao]);
    }

    public function create()
    {
        return view('variacao.create');
    }

    public function store(Request $request)
    {
        $variacao = new Variacao;
        $variacao->estoque = $request->estoque;
        $variacao->preco = $request->preco;
        $variacao->variacao = $request->variacao;
        $variacao->tipovariacao_id = $request->tipovariacao; // atribui o valor do campo "tipovariacao" ao atributo "tipovariacao_id"

        $variacao->save();

        return redirect()->back()->with('success', 'Variação cadastrada com sucesso!');
    }

    public function edit(Variacao $variacao)
    {
        return view('variacao.edit', ['variacao' => $variacao]);
    }

    public function update(Request $request, Variacao $variacao)
    {
        $variacao->estoquevariacao = $request->estoquevariacao;
        $variacao->preco = $request->preco;
        $variacao->tipovariacao = $request->tipovariacao;
        $variacao->variacao = $request->variacao;
        $variacao->save();
        return redirect()->route('variacao.index');
    }

    public function destroy($id)
    {
        $variacao = Variacao::findOrFail($id);

        $variacao->delete($variacao);

        return redirect()->back()->with('success', 'Variação excluída com sucesso!');
    }
    public function buscar(Request $request)
    {
        $termo = $request->get('termo');

        $variacao = Variacao::where('tipovariacao', 'like', "%$termo%")->get();

        return view('variacao.index', ['variacao' => $variacao]);
    }

}
