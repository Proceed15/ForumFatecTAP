@extends('layout.layout')

@section('title', 'Deletar Usuário')

@section('header', 'Deletar Usuário')

@section('content')
<div class="container">
    <h2>Deletar Usuário</h2>
    <div class="user-details">
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