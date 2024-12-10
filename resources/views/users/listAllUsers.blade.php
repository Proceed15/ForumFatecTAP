@extends('users.app')

@section('content')
    <h1 class="header-title">Todos os Usuários 
        <a href="{{ route('ListUser', Auth::user()->id) }}" class="btn btn-primary">Edite seu Perfil</a>
        <a href="{{ route('register', Auth::user()->id) }}" class="btn btn-primary">Cadastre um Usuário</a>
    </h1>
    <table border="10" class="table table-striped" enctype="multipart/form-data">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        @if($user->photo)
                            <img src="{{ url('/storage/' . $user->photo) }}"
                            alt="Imagem de Perfil" 
                            style="width: 100px;
                            height: 50px;
                            border-radius: 50%;">
                        @else
                        <img src="{{ asset('img/th-2136986254.jpg') }}" 
                            alt="Imagem Padrão"
                            style="width: 100px;
                            height: 50px;
                            border-radius: 50%;">
                        @endif
                    </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td>
                        <a class="btn-edit" href="{{ route('ListUser', Auth::user()->id) }}"> Editar <a/> | 
                        <a type="submit" class="btn-delete" href="{{ route('ListUser', Auth::user()->id) }}"> Deletar </a> |
                        <a class="btn-edit" href="{{ route('ListUser', Auth::user()->id) }}"> Suspender <a/> | 
                        <a type="submit" class="btn-delete" href="{{ route('ListUser', Auth::user()->id) }}"> Banir </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<style>
    .bg-purple {
        background-color: #6f42c1 !important; /* Cor roxa */
    }
</style>
@endsection