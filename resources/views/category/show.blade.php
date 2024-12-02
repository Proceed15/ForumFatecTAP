@extends('category.app')

@section('title', 'Detalhes da Categoria')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">{{ $category->title }}</h1>

    <div class="topic">
        <h5 class="card-title">Descrição</h5>
        <p class="card-text">{{ $category->description }}</p>

        <div class="text-center">
            <a href="{{ route('editCategory', $category->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('DeleteCategory', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</button>
            </form>
            <a href="{{ route('listCategories') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
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

    .card-title {
        margin-top: 0;
    }

    .card-text {
        margin-bottom: 20px;
    }
</style>
@endsection