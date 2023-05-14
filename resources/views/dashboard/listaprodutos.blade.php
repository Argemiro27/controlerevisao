@extends('dashboard.layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-cqa8U6O14z6EwU+vOG02pW5b5bbmb0p0eSwgC9E5aUmfrssx53mjjm1bkl7JhMVprwt/0W/IN2X9NC+ws75BQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container mt-4">
        <h1 class="mb-4">Listagem de produtos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Data e Hora</th>
                    <th>Usuário</th>
                    <th>Nome do produto</th>
                    <th>Sku</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Preço</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->created_at }}</td>
                        <td>{{ $produto->usuario_id }}</td>
                        <td>{{ $produto->nome_produto }}</td>
                        <td>{{ $produto->sku }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->foto_produto }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary submit">Editar</a>
                        </td>
                        <td>
                            <a href="{{ route('produtos.destroy', $produto->id) }}" class="btn btn-danger"
                                onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este produto?')){ document.getElementById('form-delete-{{ $produto->id }}').submit(); }">Excluir</a>
                            <form id="form-delete-{{ $produto->id }}"
                                action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
