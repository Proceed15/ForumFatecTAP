<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Layout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
        }
        header {
            background-color: #6e8efb;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            color: blue;
        }   
        header H1 a {
            color: white;
            text-decoration: none;
            padding: 1px;
            font-weight: 500;
        }
        header nav {
            display: flex;
            gap: 40px;
        }
        header nav a {
            color: white;
            text-decoration: none;
            padding: 1px;
            font-weight: 500;
        }
        .container {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #fff;
            display: flex;
            flex: 1;
        }
        .container h2 {
            /*line-height:0px;*/
            margin-bottom: 20px;
        }
        .sidebar {
            width: 200px;
            color: white;
            padding: 1rem;
            height: 100%;
            width: 150px;
            background-color: #007bff; /* Azul Claro das Barras Laterais */
            padding-top: 600px;
        }
        /* Não estou usando por enquanto.
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 0.5rem 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: white;
        }
        */
        .right-sidebar {
            width: 200px;
            color: white;
            padding: 1rem;
            height: 100%;
            width: 150px;
            background-color: #007bff; /* Azul Claro das Barras Laterais */
            padding-top: 600px;
        }
        .content {
            flex: 1;
            background-color: #adf;
            padding: 20px;
        }
        footer {
            background-color: #007bff; /* Azul Claro do Footer */
            color: #fff;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            padding: 17px;;
        }
        .pdiv{
            margin-bottom: 15px;
            text-align: left;
        }
        .pdiv label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .pdiv input {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            box-sizing: border-box;
        }

        .pdiv input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
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

        table {
            font-family: Verdana, sans-serif;
            border: dotted dashed double;
            border-radius:6px;
            border-color: #316587;
            width: 100%;
            margin: 0;
            td,
            th {
                border: 8px groove #666666;
                text-align: left;
                padding: 8px;
            }
            tbody tr:nth-child(even):not(thead) {
                background-color: #403055;
            }
            tbody tr:nth-child(odd):not(thead) {
                background-color: #403399;
            }
        }

        .user-list {
            text-align: left;
        }

        .user-list ul {
            list-style-type: none;
            padding: 0;
        }

        .user-list li {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <H1><a href="/">Fórum</a></H1>
        <nav>
            <a href="/">Página Inicial</a>
            <a href="/topics">Tópicos</a>
            <a href="/users">Usuários</a>
            @if(Auth::check())
                <a href="{{ route('listUsersByID', Auth::user()->id) }}">Bem vindo {{Auth::user()->name}}!</a>
                <a href="/logout">Sair</a>
            @else
                <a href="/login">Logar</a>
                <a href="/register">Registrar-se</a>
            @endif
        </nav>
    </header>
    <div class="container">
        <aside class="sidebar">
        </aside>
        <main class="content">
            <!-- Forum discussions go here -->
            @yield('content')
        </main>
        <aside class="right-sidebar">
            <!-- Additional widgets or information -->
        </aside>
    </div>
    <footer>
    Fórum PHP Laravel - © 2024
    </footer>
</body>
</html>
