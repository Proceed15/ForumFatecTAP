<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Início</title>

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
        .container {
            margin-top: 80px;
        }
        .topic {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
        .topic:hover {
            background-color: #e9ecef;
        }
        .topic h2 {
            margin: 0 0 5px;
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

    <div class="container">
        <h1>Tópicos Registrados</h1>

        <!-- Formulário de Pesquisa -->
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <input type="text" name="query" class="form-control" placeholder="Pesquisar tópicos..." value="{{ old('query', $query) }}" required>
            <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
        </form>

        @foreach($topics as $topic)
            <div class="topic">
                <a href="{{ route('topics.show', $topic->id) }}">
                    <h2>{{ $topic->title }}</h2>
                    <p>{{ $topic->description }}</p>
                                        <!-- Exibindo a categoria -->
                                        <div>
                        <strong>Categoria:</strong> {{ $topic->category->title ?? 'Sem Categoria' }}
                    </div>
                                        <!-- Exibindo as tags -->
                                        <div>
                        <strong>Tags:</strong>
                        @if($topic->tags->isNotEmpty())
                            @foreach($topic->tags as $tag)
                                <span class="badge badge-info">{{ $tag->title }}</span>
                            @endforeach
                        @else
                            Sem Tags
                        @endif
                    </div>
                    <div class="meta">Criado por: {{ $topic->user->name ?? 'Usuário Desconhecido' }} | Criado em: {{ $topic->created_at->format('d/m/Y') }}</div>
                    

                </a>
            </div>
        @endforeach
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>