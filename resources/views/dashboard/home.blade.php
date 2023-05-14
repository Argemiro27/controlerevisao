@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <div class="welcomewrapper" style="align-items: center; justify-content: center; text-align: center;">
            <h1 class="mb-4">Sistema de Vendas</h1>
            <p>Olá, {{ Auth::user()->name }}, seja bem-vindo!</p>
        </div>
        <br />

        <div class="cardwrapper">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-box fa-3x"></i>
                    <p>{{ \App\Models\Produtos::count() }}</p>
                    <h6 class="card-title">PRODUTOS CADASTRADOS</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <i class="fas fa-sliders-h fa-3x"></i>

                    <p>{{ \App\Models\Variacao::count() }}</p>
                    <h6 class="card-title">VARIAÇÕES CADASTRADAS</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <i class="fas fa-sliders-h fa-3x"></i>
                    <p>{{ \App\Models\TiposVariacao::count() }}</p>
                    <h6 class="card-title">TIPOS DE VARIAÇÕES CADASTRADAS</h6>

                </div>
            </div>
        </div>

    </div>
@endsection
