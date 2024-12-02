@extends('topics.app')

@section('title', 'Listar Tópicos')

@section('content')
<div class="container">
    <h2 class="header-title">Lista de Tópicos</h2>
    @if($topics->isEmpty())
        <div class="alert alert-warning" role="alert">
            Nenhum tópico encontrado.
        </div>
    @else
        @foreach ($topics as $topic)
            <div class="topic">
                <a href="{{ route('topics.show', $topic->id) }}">
                    <h3>{{ $topic->title }}</h3>
                </a>
                <p>{{ $topic->description }}</p>
                <p>Status: {{ $topic->status ? 'Ativo' : 'Inativo' }}</p>
                
                <!-- Exibindo Categorias -->
                <p>Categorias: 
                    @if($topic->categories && $topic->categories->isNotEmpty())
                        @foreach ($topic->categories as $category)
                            <span class="badge badge-secondary">{{ $category->title }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">Nenhuma categoria</span>
                    @endif
                </p>

                <!-- Exibindo Tags -->
                <p>Tags: 
                    @if($topic->tags && $topic->tags->isNotEmpty())
                        @foreach ($topic->tags as $tag)
                            <span class="badge badge-info">{{ $tag->title }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">Nenhuma tag</span>
                    @endif
                </p>

                <div class="actions">
                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este tópico?');">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
    <a href="{{ route('CreateTopic') }}" class="btn btn-primary mb-3">Criar Novo Tópico</a>
</div>

<style>
    .container {
        margin: 20px auto;
        max-width: 800px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header-title {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .topic {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
        transition: background-color 0.3s }
    
    .topic:hover {
        background-color: #f7f7f7; /* Cor ao passar o mouse */
    }

    .topic h3 {
        margin: 0;
        color: #007bff;
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
</style>
@endsection