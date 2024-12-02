<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página de Login</title>
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
        .login-container {
            background-color: #D9D9D9;
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

            <input type="submit" value="Logar" id="submit-button">
        </form>
    </div>
</div>
</body>
</html>