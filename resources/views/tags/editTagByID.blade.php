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
            <label for="tagdescription">Descrição</label>
            <input type="text" id="tagdescription" name="tagdescription" value="">
        </div>
        <div class="input-group">
            <label for="tagstatus">Status</label>
            <input type="boolean" id="tagstatus" name="tagstatus">
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
