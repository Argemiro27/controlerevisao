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
        return view('dashboard.produtos.index', compact('produtos'));
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
        $produto->save();

        // Cria a pasta do produto dentro do diretório "public" do seu projeto
        $produtoPath = public_path($produto->nome_produto);
        if (!file_exists($produtoPath)) {
            mkdir($produtoPath, 0777, true);
        }

        // Cria a pasta do SKU dentro da pasta do produto
        $skuPath = $produtoPath . '/' . $produto->sku;
        if (!file_exists($skuPath)) {
            mkdir($skuPath, 0777, true);
        }

        // Salva a imagem carregada dentro da pasta do SKU
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
            $imagePath = '/' . $produto->nome_produto . '/' . $produto->sku . '/' . $imageName;
            $image->move(public_path($imagePath));

            $produto->foto = $imagePath;
        } else {
            $produto->foto = 'sem-imagem.jpg';
        }
        $produto->save();

        $variacao = Variacao::all();
        foreach ($variacao as $variacao) {
            $variacoes = $request->input('quantidade.' . $variacoes->id);

            if ($variacoes > 0) {
                $variaproduto = new VariaProduto;
                $variaproduto->id_produto = $produto->id;
                $variaproduto->id_variacao = $variacao->id;
                $variaproduto->tipovariacao_id = $request->tipovariacao_id;
                $variaproduto->save();
            }
        }
        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produtos $produto)
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, Produtos $produto)
    {
        $produto->usuario_id = auth()->user()->id;
        $produto->nome_produto = $request->nome_produto;
        $produto->sku = $request->sku;
        $produto->foto = $request->foto;
        $produto->descricao = $request->descricao;
        $produto->estoqueprod = $request->estoqueprod;
        $produto->preco = $request->preco;
        $produto->save();
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


    public function getVariacoesByTipoVariacao($tipoVariacaoId)
{
    $variacoes = Variacao::where('tiposvariacao_id', $tipoVariacaoId)->get();
    return response()->json($variacoes);
}
}
