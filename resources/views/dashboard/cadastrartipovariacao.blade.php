@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Cadastrar Variação</h1>
        <form method="POST" action="{{ route('tipos_variacao.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Informe o tipo de variação:</label>
                <input type="nome" class="form-control" id="nome" name="nome" required>
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
