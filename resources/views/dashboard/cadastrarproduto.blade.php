@extends('dashboard.layout')

@section('content')
    <script>
        function atualizarVariacoes() {
            var tipoVariacaoId = $('#tipovariacao').val();
            $.ajax({
                url: '/api/variacaobytipovariacao/' + tipoVariacaoId,
                type: 'GET',
                success: function(response) {
                    var variacoes = response;
                    var html = '';
                    $.each(variacoes, function(key, variacao) {
                        html += '<option value="' + variacao.id + '">' + variacao.nome + '</option>';
                    });
                    $('#variacoes').html(html);
                }
            });
        }
    </script>
    <div class="container mt-4">
        <h1 class="mb-4">Cadastrar Produtos</h1>
        <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
            </div>
            <div class="form-group">
                <label for="sku">Sku:</label>
                <input type="text" class="form-control" id="sku" name="sku" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="estoqueprod">Estoque</label>
                <input type="text" class="form-control" id="estoqueprod" name="estoqueprod" required>
            </div>
            <div class="form-group">
                <label for="tipovariacao">Tipo de variação:</label>
                <select name="tipovariacao" id="tipovariacao" class="form-control" onChange="atualizarVariacoes()">
                    @foreach (\App\Models\TiposVariacao::all() as $tipovariacao)
                        <option value="{{ $tipovariacao->id }}">{{ $tipovariacao->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="variacoes">Variações:</label>
                <select name="variacoes" id="variacoes" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary submit">Cadastrar</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
@endsection
