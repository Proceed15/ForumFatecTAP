@extends('layouts.layout');

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum Mith</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #717CA3;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100px;
        }
        .container {
            background-color: #D9D9D9;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 120px;
        }
        .topic-header {
            margin-bottom: 20px;
        }
        .topic-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .topic-content {
            margin-bottom: 10px;
            color: #333;
        }
        .topic-meta {
            margin-bottom: 10px;
            color: #666;
        }
        .topic-text {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .button.edit {
            background-color: #656E8F;
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
        textarea {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
            resize: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-title">Tópicos Em Destaque</h1>

        <!-- Pesquisar Tópicos -->
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
                        <strong>Categoria:</strong> <span class="badge badge-info">{{ $topic->category->title ?? 'Sem Categoria' }}</span>
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