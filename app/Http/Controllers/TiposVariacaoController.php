<?php

namespace App\Http\Controllers;

use App\Models\TiposVariacao;
use Illuminate\Http\Request;

class TiposVariacaoController extends Controller
{
    public function index()
    {
        $tiposVariacao = TiposVariacao::with('tipos_variacao')->get();
        return view('tipos_variacao.index', ['tiposVariacao' => $tiposVariacao]);
    }

    public function create()
    {
        return view('tipos_variacao.create');
    }

    public function store(Request $request)
    {
        $tiposVariacao = new TiposVariacao;
        $tiposVariacao->nome = $request->nome;
        $tiposVariacao->save();
        return redirect()->back()->with('success', 'Tipo de variação cadastrado com sucesso!');
    }

    public function edit(TiposVariacao $tiposVariacao)
    {
        return view('tipos_variacao.edit', ['tiposVariacao' => $tiposVariacao]);
    }

    public function update(Request $request, TiposVariacao $tiposVariacao)
    {
        $tiposVariacao->nome = $request->nome;
        $tiposVariacao->save();
        return redirect()->back()->with('success', 'Tipo de variação atualizado com sucesso!');
    }
    public function destroy(TiposVariacao $tiposVariacao)
    {
        $tiposVariacao->delete();
        return redirect()->route('tipos_variacao.index');
    }
}
