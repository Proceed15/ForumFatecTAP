@extends('layouts.gpt')

@section('header', 'Listar Todos os Usuários')

@section('content')

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>Fulano</td>
            <td>fulano@email.com</td>
        </tr>
    </table>

@endsection