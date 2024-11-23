@extends('layout.layout')

@section('title', 'Deletar Categoria')

@section('header', 'Deletar Categoria')

@section('content')
<div class="container">
    <h2>Deletar Categoria</h2>
    <div class="Category-details">
        <p><strong>ID:</strong> 1</p>
        <p><strong>Nome:</strong> Usuário Exemplo</p>
        <p><strong>Email:</strong> exemplo@dominio.com</p>
        <!-- Adicione mais detalhes conforme necessário -->
    </div>
    <div class="button-group">
        <button class="delete">Deletar</button>
        <button class="cancel">Cancelar</button>
    </div>
</div>
@endsection
