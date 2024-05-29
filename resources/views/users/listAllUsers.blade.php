@extends('layout.gpt')

@section('title', 'Listar Todos os Usuários')

@section('header', 'Listar Todos os Usuários')

@section('content')
<div class="container">
    <h2>Listar Todos os Usuários</h2>
    <table border="1">
        <tr>
            <td>Nome</td>
            <td>Email<td>
        </tr>
        <tr>
            <td>José</td>
            <td>jose@gmail.com</td>
        </tr>
    </table>
</div>
@endsection
