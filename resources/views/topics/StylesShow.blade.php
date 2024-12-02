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
        /* Estilo específico para a página de visualização de tópicos */
        .container {
    background: linear-gradient(135deg, #f0f4f8, #a777e3);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 30px;
    color: #333;
    margin-top: 70px;
    display: block;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.container h1, .container p {
    color: #333;
    font-size: 18px;
}

.container .btn {
    margin-top: 15px;
}

        .topic-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .topic-container h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .topic-container p {
            font-size: 18px;
            color: #333;
        }

        .badge-info {
            background-color: #3498db;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .comment-list {
            margin-top: 30px;
        }

        .comment-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .comment-actions button {
            margin-right: 5px;
        }

        .topic-actions {
            margin-top: 20px;
        }

        .topic-actions button {
            margin-right: 10px;
        }

    </style>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/users') }}">Usuários</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="tagsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tags
                    </a>
                    <div class="dropdown-menu" aria-labelledby="tagsDropdown">
                        <a class="dropdown-item" href="{{ route('listAllTags') }}">Ver Tags</a>
                        <a class="dropdown-item" href="{{ route('CreateTag') }}">Criar Tag</a>
                    </div>
                </ li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <a class="dropdown-item" href="{{ route('listCategories') }}">Ver Categorias</a>
                        <a class="dropdown-item" href="{{ route('createCategory') }}">Criar Categoria</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="topicsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tópicos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="topicsDropdown">
                        <a class="dropdown-item" href="{{ route('topics.index') }}">Ver Tópicos</a>
                        <a class="dropdown-item" href="{{ route('CreateTopic') }}">Criar Tópico</a>
                    </div>
                </li>
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
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

   
    <!-- Bootstrap JS (As Dependências) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
