@extends('layout.layout')

@section('title', 'Listar Todos os Tópicos')

@section('header', 'Listar Todos os Tópicos')

@section('content')
<div class="container">
    <h1>Listar Todos os Tópicos
    @if(Auth::check())
    <br></br>
    <a href="create">Crie um Tópico</a>
    <br></br>
    
    @endif
    </h1>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Status </td>
            <td> Editar </td>
        @foreach($topics as $topic)
        <tr>
            <td> {{ $topic -> title }} </td>
            <td> {{ $topic -> description }} </td>
            <td> {{ $topic -> status }} </td>
            <td> <a href={{ route('edit_topic', [$topic -> id]) }}>Edite um Tópico</a></td>
        </tr>
        @endforeach
        </tr>
    </table>
</div>
@endsection
