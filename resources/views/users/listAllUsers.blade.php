@extends('users.app')

@section('content')
<div class="container mt-5">
    <h1 class="header-title">Todos os Usuários</h1>
    <a href="{{ route('ListUser', Auth::user()->id) }}" class="btn btn-primary">Edite seu Perfil</a>
    <a href="{{ route('register', Auth::user()->id) }}" class="btn btn-primary">Cadastre um Usuário</a>
    <table border="10" class="table table-striped">
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
<style>
    .bg-purple {
        background-color: #6f42c1 !important; /* Cor roxa */
    }
</style>
@endsection