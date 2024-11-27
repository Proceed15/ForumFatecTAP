@extends('layout.layout')

@section('title', 'Perfil de Usuário')

@section('header', 'Perfil de  Usuário')

@section('content')
<!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Perfil</title>
    <link href="../forum.css" rel="stylesheet">
</head>
-->
    <div class="login-container">
    <h1>Perfil de Usuário</h1>
            <span>{{ session('message') }}</span>
            @if($user != null)
            <form action="{{ route('editUserByID', [$user->id]) }}" method="post">
              @csrf <!--Tag em PHP para habilitar o Token de acesso-->
              @method('put')
                <div class="input-group">
                    <label for="name">Usuário</label>
                    <input type="string" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                @error('name') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                @error('email') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password">
                </div>
                @error('password') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="password">Confirmar Senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                @error('password') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="photo">Foto de Perfil</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <button type="submit">Editar Perfil &nbsp;
                <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </form>
            <form action="{{route('deleteUserByID', [$user->id])}}" method="post">
                <!-- Área de excluir usuário -->
                    @csrf <!--tag em php para o token funcionar-->
                    @method('delete')

                    <button class="delete" type="submit">Excluir Usuário &nbsp;
                    <i class="fa-solid fa-delete-left"></i>
                    </button>
            </form>
            {{--
            <form action="{{ route('deleteUserByID', [$user->id]) }}" method="post">
              @csrf <!--Tag em PHP para habilitar o Token de acesso-->
              @method('delete')
              <input type="submit" value="Excluir">
              <!--<input type="submit" value="Excluir">-->
            </form>
            --}}
            @else
            <div>Esse usuário não foi encontrado!</div>
            @endif
    </div>
    @endsection
    <style>
        .login-container {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 777px;
            text-align: center;
            color: #fff;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-weight: 500;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .input-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            box-sizing: border-box;
        }

        .input-group input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        button {
            width: 100%;
            padding: 12px 0;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>