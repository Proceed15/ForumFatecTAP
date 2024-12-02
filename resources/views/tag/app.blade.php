<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8; /* Cor de fundo mais suave */
            font-family: 'Nunito', sans-serif; /* Fonte padronizada */
        }
        .container {
            margin-top: 80px; /* Espaçamento superior */
        }
        .navbar {
            margin-bottom: 20px; /* Espaçamento inferior para a navbar */
        }
        footer {
            background-color: #343a40; /* Cor de fundo do rodapé */
            color: white; /* Cor do texto do rodapé */
            padding: 10px 0; /* Espaçamento interno do rodapé */
            text-align: center; /* Centralizar texto do rodapé */
        }
        footer p {
            margin: 0; /* Remover margem do parágrafo */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">For1</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('listCategories') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('createCategory') }}">Criar Categoria</a>
                </li>
                <!-- Adicione outros itens de navegação conforme necessário -->
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <span class="navbar-text mr-3">Bem-vindo(a): {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

   

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>