@extends('layout.layout')

@section('title', 'Editar Tópico')

@section('header', 'Editar Tópico')

@section('content')
<div class="container">
    <h2>Editar Tópico</h2>
    <form action="edit_topic" method="post">
        <div class="input-group">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" value="">
        </div>
        <div class="input-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" value="">
        </div>
        <div class="input-group">
            <label for="status">Status</label>
            <input type="boolean" id="status" name="status">
        </div>
        <div class="input-group">
            <label for="image">Imagem</label>
            <input type="string" id="image" name="image" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
