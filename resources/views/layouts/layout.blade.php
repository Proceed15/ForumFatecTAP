    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f4f8;
        }
        .header-title {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .button.like {
            background-color: #3498db;
            margin-left: 10px;
        }
        .button.dislike {
            background-color: #e74c3c;
            margin-left: 10px;
        }
        .button.comment {
            background-color: #656E8F;
        }
        .comment {
            background-color: #EFEFEF;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
        }
        .comment p {
            margin-bottom: 5px;
        }
    .actions {
        margin-top: 10px;
    }

    .btn {
        margin-right: 5px;
    }

    .badge {
        margin-right: 5px;
    }

    .text-muted {
        color: #6c757d;
    }
        .topic {
            background: linear-gradient(135deg, #f0f4f8, #a777e3);
            padding: 20px;
            margin-top: 25px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
        .topic:hover {
            background-color: #e9ecef;
        }
        .topic h2 {
            margin: 0 0 15px;
            font-size: 18px;
            color: #007bff;
        }
        .topic p {
            margin: 5px 0;
            color: #495057;
        }
        .meta {
            text-align: right;
            font-size: 14px;
            color: #6c757d;
        }
        .badge {
            margin-right: 5px;
        }
        .container {
            background: linear-gradient(135deg, #f0f4f8, #a777e3);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #fff;
            display: flex;
            flex: 1;
            margin-top: 70px;
        }
        .navbar {
            background-color: #f0f4f8;
            color: f0f4f8;
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