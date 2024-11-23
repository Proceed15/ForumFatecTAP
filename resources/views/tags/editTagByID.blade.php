@extends('layout.layout')

@section('title', 'Editar Tag')

@section('header', 'Editar Tag')

@section('content')
<div class="container">
    <h2>Editar Tag</h2>
    <form action="edit_tag" method="post">
        <div class="input-group">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" value="">
        </div>
        <div class="input-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" value="">
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
