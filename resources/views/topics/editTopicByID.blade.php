@extends('layout.layout')

@section('title', 'Editar Tópico')

@section('header', 'Editar Tópico')

@section('content')
<div class="container">
    <h2>Editar Usuário</h2>
    <form action="edit_user" method="post">
        <div class="input-group">
            <label for="username">Nome</label>
            <input type="text" id="username" name="username" value="" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" required>
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
