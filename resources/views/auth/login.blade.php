@extends('layout.layout')

@section('title', 'Perfil de Usuário')

@section('header', 'Perfil de  Usuário')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h1>Login</h1>
            <form action="{{ route('loginUser') }}" method="post">
              @csrf
                <div class="input-group">
                    <label for="username">Usuário</label>
                    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                    @error('email') <span>{{ $message }}</span> @enderror
                </div>
                <div class="input-group">
                    <label for="password">Senha</label> 
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                    @error('password') <span>{{ $message }}</span> @enderror
                </div>
                <button type="submit">Entrar</button>
            </form>
        </div>
        <a href="/register">Não possui uma conta? Criar Conta</a>
    </div>
    @endsection
    <style>
        .login-container {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
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