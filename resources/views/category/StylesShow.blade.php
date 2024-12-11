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

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            align: center;
        }

        .card-title {
            font-size: 24px;
            color: #333;
        }

        .card-text {
            font-size: 16px;
            color: #666;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-secondary {
            margin-left: 10px;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">  
    <img src="{{ asset('img/PurLogo.png') }}"
    alt="Logo do Forum Mith";
    style="width: 37px;
    height: 37px;
    border-radius: 50%;">
    Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuários
                </a>
                <div class="dropdown-menu" aria-labelledby="usersDropdown">
                    <a class="dropdown-item" href="{{ route('ListAllUsers') }}">Ver Usuários</a>
                    <a class="dropdown-item" href="{{ route('register')}}">Cadastrar Usuário</a>
                    @auth
                        <a class="dropdown-item" href="{{ route('ListUser', ['uid' => Auth::user()->id])}}">Visualizar Perfil</a>
                    @else
                        <a class="dropdown-item" href="{{ route('login')}}">Entrar em sua Conta</a>
                    @endauth    
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="tagsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tags
                </a>
                <div class="dropdown-menu" aria-labelledby="tagsDropdown">
                    <a class="dropdown-item" href="{{ route('listAllTags') }}">Ver Tags</a>
                    <a class="dropdown-item" href="{{ route('CreateTag') }}">Criar Tag</a>
                </div>
            </li>
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
        <li class="nav-item d-flex align-items-center">
            <span class="navbar-text mr-2">Bem-vindo(a): {{ Auth::user()->name }}</span>
            @if(Auth::user()->photo)
                <a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}">
                    <img src="{{ url('/storage/' . Auth::user()->photo) }}"
                         alt="Imagem de Perfil"
                         style="width: 37px; height: 37px; border-radius: 50%;">
                </a>
            @else
                <a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}">
                    <img src="{{ asset('img/th-2136986254.jpg') }}"
                         alt="Imagem Padrão"
                         style="width: 37px; height: 37px; border-radius: 50%;">
                </a>
            @endif
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
