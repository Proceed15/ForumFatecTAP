@extends('layout.gpt')

@section('title', 'Criar Usuário')

@section('header', 'Criar Usuário')

@section('content')
<div class="container">
    <h2>Criar Usuário</h2>
    <form action="create_user" method="post">
        <div class="input-group">
            <label for="username">Nome</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Criar</button>
    </form>
</div>
@endsection
