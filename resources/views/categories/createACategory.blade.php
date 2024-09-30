@extends('layout.layout')

@section('title', 'Criar category')

@section('header', 'Criar category')

@section('content')
<div class="container">
    <h2>Criar category</h2>
    <form action="create" method="post">
        <div class="input-group">
            <label for="title">Nome</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="input-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" required>
        </div>
        <button type="submit">Criar</button>
    </form>
</div>
@endsection
