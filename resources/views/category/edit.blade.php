@extends('category.app')

@section('title', 'Editar Categoria')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Editar Categoria: {{ $category->title }}</h2> 

    <!-- Formulário para editar a categoria -->
    <form action="{{ route('UpdateCategory', $category->id) }}" method="post" class="mb-3">
        @csrf
        @method('PUT') <!-- Certifique-se de que está em maiúsculo -->

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Título" value="{{ $category->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" name="description" class="form-control" placeholder="Descrição" required>{{ $category->description }}</textarea>
        </div>

        <div class="text-right">
            <input type="submit" value="Salvar Alterações" id="submit-button" class="btn btn-warning mr-2">
        </div>
    </form>

    <!-- Formulário para deletar a categoria -->
    <div class="text-right">
        <form action="{{ route('DeleteCategory', $category->id) }}" method="post" style="display:inline;">
            @csrf
            @method('DELETE') <!-- Certifique-se de que está em maiúsculo -->
            <button type="submit" class="btn btn-danger mr-2" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</button>
        </form>

        <!-- Botão Voltar -->
        <a href="{{ route('listCategories') }}" class="btn btn-secondary">Voltar</a>
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

    .form-group {
        margin-bottom: 15px;
    }
</style>
@endsection