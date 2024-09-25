@extends('layout.layout')

@section('title', 'Listar Tag por ID')

@section('header', 'Listar Tag por ID')

@section('content')
<div class="container">
    <h2>Listar Tag por ID</h2>
    <form action="" method="get">
        <div class="input-group">
            <label for="user_id">ID da Tag</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        <button type="submit">Buscar</button>
    </form>
</div>
@endsection
