<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        <a style="color: #fff !important" href="/listaprodutos"><button class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</button></a>
        <form class="form" method="POST" action="{{ route('produtos.update', $produto->id) }}">
            @csrf
            @method('PUT')
            <h1 class="mb-4">Editar produto:</h1>
            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
            </div>
            <div class="form-group">
                <label for="sku">Sku:</label>
                <input type="text" class="form-control" id="sku" name="sku" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="estoqueprod">Estoque</label>
                <input type="text" class="form-control" id="estoqueprod" name="estoqueprod" required>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="display:none">ID</th>
                        <th scope="col">Tipo de Variação</th>
                        <th scope="col">Variação</th>
                        <th scope="col">Selecionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\Variacao::join('tipos_variacao', 'variacao.tipovariacao_id', '=', 'tipos_variacao.id')->orderBy('tipos_variacao.nome')->get() as $variacao)
                        <tr>
                            <td style="display:none">{{ $variacao->tipovariacao_id }}</td>
                            <td>{{ $variacao->tipoVariacao->nome }}</td>
                            <td>{{ $variacao->variacao }}</td>
                            <td>
                                <input type="checkbox" name="variacao[]" value="{{ $variacao->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="form-group">
                <label for="foto_produto">Foto</label>
                <input type="file" class="form-control-file" id="foto_produto" name="foto_produto">
            </div>
            <button type="submit" class="btn btn-primary submit"><i class="fas fa-edit"></i> Editar</button>
            
        </form>
    </div>
</body>