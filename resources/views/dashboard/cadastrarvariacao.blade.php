@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Cadastrar Variação</h1>
        <form method="POST" action="{{ route('variacao.store') }}">
            @csrf
            <div class="form-group">
                <label for="estoque">Estoque da variação:</label>
                <input type="estoque" class="form-control" id="estoque" name="estoque" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="form-group">
                <label for="tipovariacao">Tipo de variação:</label>
                <select name="tipovariacao" id="tipovariacao" class="form-control">
                    @foreach (\App\Models\TiposVariacao::all() as $tipovariacao)
                        <option value="{{ $tipovariacao->id }}">{{ $tipovariacao->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="variacao">Variação</label>
                <input type="text" class="form-control" id="variacao" name="variacao" required>
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
