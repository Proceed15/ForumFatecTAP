@extends('layout.layout')

@section('title', 'Listar Todos as Tags')

@section('header', 'Listar Todos as Tags')

@section('content')
<div class="container">
    <h1>Listar Todas as Tags
    @if(Auth::check())
    <br></br>
    <a href="createtag">Crie uma Tag</a>
    <br></br>
    
    @endif
    </h1>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Editar </td>
        @foreach($tags as $tag)
        <tr>
            <td> {{ $tag -> title }} </td>
            <td> {{ $tag -> description }} </td>
            <td> <a href={{ route('edit_tag', [$tag -> id]) }}>Edite uma Tag</a></td>
        </tr>
        @endforeach
        </tr>
    </table>
</div>
@endsection
