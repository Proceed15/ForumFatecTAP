<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo */
        }
        .navbar {
            margin-bottom: 20px;
        }
        header {
            background-color: #000000; /* Cor do cabeçalho */
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        footer {
            background-color: #007bff; /* Cor do rodapé */
            color: #fff;
            padding: 10px;
            text-align: center;
            position: relative; /* Alterado para não ser fixo */
            bottom: 0;
            width: 100%;
        }
        .content {
            padding: 20px;
        }
        .tag-list {
            margin-top: 10px;
            padding: 0;
            list-style: none;
        }
        .tag-list li {
            display: inline;
            margin-right: 10px;
        }
        .tag {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }
        .img-fluid {
            border-radius: 5px; /* Bordas arredondadas para a imagem */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Minha Aplicação</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('listCategories') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('createCategory') }}">Criar Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ListAllTags') }}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('CreateTag') }}">Criar Tag</a>
                </li>
            </ul>
        </div>
    </nav>

    <header>
        <h1>@yield('header')</h1>
    </header>

    <div class="container content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>