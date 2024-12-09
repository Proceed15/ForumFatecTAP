@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #717CA3;
            margin: 0;
        }
        .form-container {
            background: linear-gradient(135deg, #f0f4f8, #a777e3);
            position: absolute;
            top: 53%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            border-radius: 15px;
            color: #000;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            width: calc(100% - 30px);
            margin-bottom: 20px;
            background-color: #f0f4f8;
            border-radius: 5px;
        }
        button, input[type="submit"] {
            background: linear-gradient(135deg, #f0f4f8, #a777e3);
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover, input[type="submit"]:hover {
            background-color: #505A7B;
        }
        .aspx {
            padding: 10px;
            font-size: 27px;
        }
    </style>
</head>
<body>
    <div class="form-container">
    <h1>Cadastrar-se</h1>
    <form id="registration-form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" placeholder="Nome" value="{{ old('name')}}" required>
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="E-mail" value="{{ old('email')}}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <label for="photo">Imagem:</label>
        <input type="file" name="photo" class="form-control-file" accept="image/*">

        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Senha" value="{{ old('password')}}" required>
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <label for="password_confirmation">Confirmar a Senha</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Senha de Confirmação" required>
        @error('password') <span class="error">{{ $message }}</span> @enderror
        <p></p>
        <input type="submit" value="Cadastrar" id="submit-button">
        <div class="aspx"><a href="/login">Logar</a></div>
    </form>
</div>
</body>
</html>