@extends('layout.layout')

@section('title', 'Editar Usuário')

@section('header', 'Editar Usuário')

@section('content')
<!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Perfil</title>
    <link href="../forum.css" rel="stylesheet">
</head>
-->
    <div class="container">
            <h2>Edição de Dados Cadastrais</h2>
            <span>{{ session('message') }}</span>
            @if($user != null)
            <form action="{{ route('editTopicByID', [$topic->id]) }}" method="post">
              @csrf <!--Tag em PHP para habilitar o Token de acesso-->
              @method('put')
                <div class="input-group">
                    <label for="name">Usuário</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                @error('name') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="email">email</label>
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
                <button type="submit">Editar registro</button>
            </form>
            <br />
            <form action="{{ route('deleteTopicByID', [$topic->id]) }}" method="post">
              @csrf <!--Tag em PHP para habilitar o Token de acesso-->
              @method('delete')
              <button type="submit" value="Excluir">Excluir</button>
              <!--<input type="submit" value="Excluir">-->
            </form>
            @endif
    </div>
    @endsection
    <!--
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .login-container {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
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
    -->