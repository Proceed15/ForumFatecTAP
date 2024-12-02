@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
    body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #717CA3;
            margin: 0;
        }
        .login-container {
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
    .action-buttons {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 10px;
    }
    .action-buttons form {
        flex: 1;
        margin: 0 5px;
    }
    .action-buttons input[type="submit"] {
        padding: 15px;
        font-size: 15px;
    }
</style>
</head>
<body>
    <div class="login-container">
    <h1>Login</h1>
    <div class="login-form">
        <form id="login-form" action="{{ route('login') }}" method="post">
            @csrf
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="Senha" value="{{ old('password') }}" required>
            @error('password') <span class="error">{{ $message }}</span> @enderror
            <p></p>
            <input type="submit" value="Logar" id="submit-button">
        </form>
    </div>
</div>
</body>
</html>