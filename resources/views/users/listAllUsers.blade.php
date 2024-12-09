@extends('users.app')

@section('content')
<div class="container">
    <h1>Listar Todos os Usuários
    <br></br>
    <a href="{{ route('ListUser', Auth::user()->id) }}">Edite seu Perfil</a>
    </h1>
    <table border="10">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td>
                        <a class="btn-edit" href="{{ route('ListUser', Auth::user()->id) }}"> Editar <a/>
                        <a type="submit" class="btn-delete" href="{{ route('ListUser', Auth::user()->id) }}"> Deletar </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection