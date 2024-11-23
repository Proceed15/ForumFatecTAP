@extends('layout.layout')

@section('title', 'Criar Tópico')

@section('header', 'Criar Tópico')

@section('content')
<div class="container">
    <h2>Criar Tópico</h2>
    <form action="create" method="post">
        <div class="input-group">
            <label for="topicname">Nome</label>
            <input type="text" id="topicname" name="topicname" required>
        </div>
        <div class="input-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" required>
        </div>
        <div class="input-group">
            <label for="status">Status</label>
            <input type="int" id="status" name="status" required>
        </div>
        <div class="input-group">
            <label for="image">Imagem</label>
            <input type="string" id="image" name="image" required>
        </div>
        <button type="submit">Criar</button>
    </form>
</div>
@endsection
