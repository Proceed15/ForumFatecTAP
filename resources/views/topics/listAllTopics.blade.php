@extends('layout.layout')

@section('title', 'Listar Todos os Tópicos')

@section('header', 'Listar Todos os Tópicos')

@section('content')
<div class="container">
    <h2>Listar Todos os Tópicos</h2>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Status </td>
        </tr>
        @foreach($topics as $topic)
        <tr>
            <td> {{ $topic -> title }} </td>
            <td> {{ $topic -> description }} </td>
            <td> {{ $topic -> status }} </td>
            <br></br>
        </tr>
        @endforeach
    </table>
</div>
@endsection
