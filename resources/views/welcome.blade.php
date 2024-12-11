@extends('home.style');
@extends('layouts.layout')
<!-- Página Inicial do Forum Mith-->

    <div class="container">
        <h1 class="header-title">Tópicos Em Destaque</h1>

        <!-- Pesquisar Tópicos -->
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <input type="text" name="query" class="form-control" placeholder="Pesquisar tópicos..." value="{{ old('query', $query) }}" required>
            <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
        </form>

@foreach($topics->take(3) as $topic)
            <div class="topic">
                <a href="{{ route('topics.show', $topic->id) }}">
                    <h2>{{ $topic->title }}</h2>
                    <p class="topic topic-description">{{ $topic->description }}</p>
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
