@extends('users.app')

@section('content')
<div class="container">
    <h1>Listar Todos os Usuários
    <br></br>
    <a href="{{ route('UpdateUser', Auth::user()->id) }}">Edite seu Perfil</a>
    </h1>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Email </td>
        @foreach($users as $user)
        <tr>
            <td> {{ $user -> name }} </td>
            <td> {{ $user -> email }} </td>
        </tr>
        @endforeach
        </tr>
    </table>
</div>
@endsection
