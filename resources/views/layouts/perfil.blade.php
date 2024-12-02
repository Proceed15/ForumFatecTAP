<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tela de Perfil</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<style>
  body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #717CA3;
        margin: 0;
    }
    .navbar {
        background-color: #6D6565;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        padding: 0 20px;
        width: 100%;
        position: fixed;
        top: 0;
    }
    .navbar .brand {
        display: flex;
        align-items: center;
        color: white;
        font-size: 20px;
        padding: 20px 0;
    }
    .navbar .menu {
        display: flex;
    }
    .navbar .menu a {
        display: block;
        color: white;
        text-align: center;
        padding: 20px 50px;
        text-decoration: none;
    }
    .navbar .menu a:hover {
        background-color: #656E8F;
        color: white;
    }
    .navbar ul {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }
    .navbar li {
        margin-left: 15px;
    }
    .profile-container {
        background-color: #D9D9D9;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 30px;
        border-radius: 15px;
        color: #000;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 300px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        width: 100%;
    }
    .profile-header h1 {
        margin: 0 0 10px 0;
    }
    .profile-header .user-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #D0C9C9;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #808080;
        font-size: 36px;
        position: relative;
        margin-top: 10px;
    }
    .profile-header input[type="file"] {
        display: none;
    }
    .profile-header label {
        cursor: pointer;
    }
    .profile-fields {
        margin-top: 10px;
        width: 100%;
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
        background-color: #D0C9C9;
        border-radius: 5px;
    }
    button, input[type="submit"] {
        background-color: #656E8F;
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
    .error {
        color: red;
        font-size: 12px;
    }
    @media screen and (max-width: 600px) {
        .profile-header {
            flex-direction: column;
            align-items: center;
        }
        .profile-header .user-icon {
            position: static;
            margin-top: 10px;
        }
        .profile-container {
            text-align: center;
            padding-top: 20px;
        }
        .profile-header h1 {
            position: static;
            transform: none;
            background-color: transparent;
            color: #000;
            padding: 0;
            font-size: 16px;
        }
    }
</style>
</head>
<body>
<div class="navbar">
        <div class="brand">
        For1
        </div>
        <div class="menu">
            <ul>
                <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Pagina Inicial</a>
                @auth
                    <li><a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Perfil</a></li>
                    <li><a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>


    <div class="profile-container">
    <div class="profile-header">
        <h1>Perfil</h1>
        <span>{{ session('message') }}</span>
        @if($user != null)
        <form id="registration-form" action="{{ route('UpdateUser', [$user->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="profile-fields">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Nome" value="{{ $user->name}}" required>
                @error('name') <span class="error">{{ $message }} </span> @enderror

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail" value="{{ $user->email}}" required>
                @error('email') <span class="error">{{ $message }} </span> @enderror

                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Senha">
                @error('password') <span class="error">{{ $message }} </span> @enderror
            </div>
            <div class="action-buttons">
                <form id="edit-form" action="{{ route('UpdateUser', [$user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="submit" value="Editar" id="submit-button">
                </form>
                <form id="delete-form" action="{{ route('DeleteUser', [$user->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Deletar" id="delete-button">
                </form>
            </div>
        </form>
        @endif
    </div>
</div>
</body>
</html>