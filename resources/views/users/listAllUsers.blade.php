@extends('layout.layout')

@section('title', 'Listar Todos os Usuários')

@section('header', 'Listar Todos os Usuários')

@section('content')
<div class="container">
    <h2>Listar Todos os Usuários</h2>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Email </td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td> {{ $user -> name }} </td>
            <td> {{ $user -> email }} </td>
            <br></br>
        </tr>
        @endforeach
    </table>
</div>
@endsection
