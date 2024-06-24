@extends('layout.layout')

@section('title', 'Listar Todos os Tópicos')

@section('header', 'Listar Todos os Tópicos')

@section('content')
<div class="container">
    <h1>Listar Todos os Tópicos
    <br></br>
    <a href="create">Crie um Tópico</a>
    </h1>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Status </td>
        @foreach($topics as $topic)
        <tr>
            <td> {{ $topic -> title }} </td>
            <td> {{ $topic -> description }} </td>
            <td> {{ $topic -> status }} </td>
        </tr>
        @endforeach
        </tr>
    </table>
</div>
@endsection
