<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Variacao;
use App\Models\VariaProduto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();
        return view('dashboard.listaprodutos', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('produtos.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $produto = new Produtos;
        $produto->usuario_id = auth()->user()->id;
        $produto->nome_produto = $request->nome_produto;
        $produto->sku = $request->sku;
        $produto->descricao = $request->descricao;
        $produto->estoqueprod = $request->estoqueprod;
        $produto->preco = $request->preco;
        // Upload de imagem
        if ($request->hasFile('foto_produto')) {
            $foto_produto = $request->file('foto_produto');
            $path = 'www/' . $produto->nome_produto . '/' . $produto->sku;
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            
            $filename = $foto_produto->getClientOriginalName();
            $foto_produto->storeAs($path, $filename);
            $produto->foto_produto = $path . '/' . $filename;
        }

        $produto->save();

        $id_produto = $produto->id;

        // Percorre as variações selecionadas no formulário
        foreach ($request->input('variacao') as $variacao_id) {
            $variacao = Variacao::find($variacao_id);

            $variaproduto = new VariaProduto;
            $variaproduto->id_produto = $id_produto;
            $variaproduto->id_variacao = $variacao->id;
            $variaproduto->tipovariacao_id = $variacao->tipovariacao_id;
            $variaproduto->save();
        }

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produtos::find($id);
        return view('dashboard.editarproduto', compact('produto', 'id'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->usuario_id = auth()->user()->id;
        $produto->nome_produto = $request->nome_produto;
        $produto->sku = $request->sku;
        $produto->descricao = $request->descricao;
        $produto->estoqueprod = $request->estoqueprod;
        $produto->preco = $request->preco;

        $produto->save();

        $id_produto = $produto->id;

        // Percorre as variações selecionadas no formulário
        foreach ($request->input('variacao') as $variacao_id) {
            $variaproduto = Produtos::find($id_variacao);
            $variaproduto->id_variacao = $variacao->id;
            $variaproduto->tipovariacao_id = $variacao->tipovariacao_id;
            $variaproduto->save();
        }

        return redirect()->back()->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produtos::findOrFail($id);

        $produto->delete($produto);

        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }

    public function buscar(Request $request)
    {
        $termo = $request->get('termo');

        $produtos = Produtos::where('nome', 'like', "%$termo%")->get();

        return response()->json($produtos);
    }

    public function tipoVariacao()
    {
        return $this->belongsTo(TipoVariacao::class, 'tipovariacao_id');
    }
}
