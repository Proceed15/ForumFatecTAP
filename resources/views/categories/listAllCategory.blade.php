@extends('layout.layout')

@section('title', 'Listar Todos as Categorias')

@section('header', 'Listar Todos as Categorias')

@section('content')
<div class="container">
    <h1>Listar Todas as Categorias
    @if(Auth::check())
    <br></br>
    <a href="createtag">Crie uma Categoria</a>
    <br></br>
    
    @endif
    </h1>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Editar </td>
        @foreach($categories as $category)
        <tr>
            <td> {{ $category -> title }} </td>
            <td> {{ $category -> description }} </td>
            <td> <a href={{ route('edit_category', [$category -> id]) }}>Edite uma Categoria</a></td>
        </tr>
        @endforeach
        </tr>
    </table>
</div>
@endsection
