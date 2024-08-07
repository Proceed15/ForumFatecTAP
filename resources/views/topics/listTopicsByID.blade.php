@extends('layout.layout')

@section('title', 'Listar Tópico por ID')

@section('header', 'Listar Tópico por ID')

@section('content')
<div class="container">
    <h2>Listar Tópico por ID</h2>
    <form action="" method="get">
        <div class="input-group">
            <label for="user_id">ID do Tópico</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        <button type="submit">Buscar</button>
    </form>
</div>
@endsection
