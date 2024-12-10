@extends('category.app')

@section('title', 'Visualizar Categorias')

@section('content')

    <h2 class="header-title">Lista de Categorias</h2>
    @if($categories->isEmpty())
        <div class="alert alert-warning" role="alert">
            Nenhuma categoria encontrada.
        </div>
    @else
        @foreach ($categories as $category)
            <div class="topic">
                <a href="{{ route('showCategory', $category->id) }}">
                    <h3>{{ $category->title }}</h3>
                    <p>{{ $category->description }}</p>
                    <div class="meta">Criado em: {{ $category->created_at->format('d/m/Y') }}</div>
                </a>
                <div class="actions">
                    <a href="{{ route('editCategory', $category->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('DeleteCategory', [$category->id]) }}" method="post" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

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
        transition: background-color 0.3s;
    }

    .topic:hover {
        background-color: #f7f7f7; /* Cor ao passar o mouse */
    }

    .topic h3 {
        margin: 0;
        color: #007bff;
    }

    .topic p {
        margin: 5px 0;
        color: #555;
    }

    .meta {
        font-size: 0.9em;
        color: #888;
    }

    .actions {
        margin-top: 10px;
    }

    .btn {
        margin-right: 5px;
    }
</style>
@endsection