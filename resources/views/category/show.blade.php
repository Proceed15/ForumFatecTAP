@extends('category.StylesShow')

@section('title', 'Detalhes da Categoria')

@section('content')
<div class="topic">
    <h1 class="my-4 text-center">{{ $category->title }}</h1>

    <div class="card-body">
        <h5 class="card-title">Descrição</h5>
        <p class="card-text">{{ $category->description }}</p>

        <div class="card-text">
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
@endsection