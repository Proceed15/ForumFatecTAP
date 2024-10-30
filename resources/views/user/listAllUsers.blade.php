@extends('layouts.gpt')

@section('header', 'Listar Todos os Usuários')

@section('content')

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Role</th>
        </tr>
        <tr>
            <td>Exemplo</td>
            <td>exemplo@email.com</td>
            <td>Foto Exemplo</td>
            <td>Função</td>
        </tr>
    </table>

@endsection