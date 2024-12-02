@extends('topics.app')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Tópico</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('topics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Categoria:</label>
            <select name="category_id" class="form-control" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" name="image" class="form-control-file" accept="image/*">
        </div>

        <div class="form-group">
            <label>Status:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="1" id="status_ativo" required>
                <label class="form-check-label" for="status_ativo">Ativo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="0" id="status_inativo" required>
                <label class="form-check-label" for="status_inativo">Inativo</label>
            </div>
        </div>

        <div class="form-group">
            <label>Tags:</label><br>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}">
                    <label class="form-check-label" for="tag_{{ $tag->id }}">
                        {{ $tag->title }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Criar Tópico</button>
        <a href="{{ route('topics.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection