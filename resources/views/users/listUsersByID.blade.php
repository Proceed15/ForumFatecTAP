@extends('layout.gpt')

@section('title', 'Listar Usuário por ID')

@section('header', 'Listar Usuário por ID')

@section('content')
<div class="container">
    <h2>Listar Usuário por ID</h2>
    <form action="list_user_by_id" method="get">
        <div class="input-group">
            <label for="user_id">ID do Usuário</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        <button type="submit">Buscar</button>
    </form>
</div>
@endsection
