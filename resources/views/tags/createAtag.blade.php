@extends('layout.layout')

@section('title', 'Criar Tag')

@section('header', 'Criar Tag')

@section('content')
<div class="container">
    <h2>Criar Tag</h2>
    <form action="create" method="post">
        <div class="input-group">
            <label for="title">Nome</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="input-group">
            <label for="tagdescription">Descrição</label>
            <input type="text" id="tagdescription" name="tagdescription" required>
        </div>
        <div class="input-group">
            <label for="tagstatus">Status</label>
            <input type="int" id="tagstatus" name="tagstatus" required>
        </div>
        <button type="submit">Criar</button>
    </form>
</div>
@endsection
