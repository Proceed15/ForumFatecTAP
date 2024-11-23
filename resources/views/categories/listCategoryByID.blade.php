@extends('layout.layout')

@section('title', 'Listar Categoria por ID')

@section('header', 'Listar Categoria por ID')

@section('content')
<div class="container">
    <h2>Listar Categoria por ID</h2>
    <form action="" method="get">
        <div class="input-group">
            <label for="category_id">ID da Categoria</label>
            <input type="text" id="category_id" name="category_id" required>
        </div>
        <button type="submit">Buscar</button>
    </form>
</div>
@endsection
