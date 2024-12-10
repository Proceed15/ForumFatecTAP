@extends('layouts.style')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Fonts -->
<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
