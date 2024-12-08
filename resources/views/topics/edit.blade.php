@extends('topics.app')

@section('content')
<div class="container">
    <h1>Editar Tópico: {{ $topic->title }}</h1>

    @if ($topic->post && $topic->post->image)
        <div class="mb-3">
            <img src="{{ asset('/storage/' . $topic->post->image) }}" alt="Imagem Atual do Post" class="img-fluid mb-2">
            <p><strong>Imagem Atual</strong></p>
        </div>
    @else
        <p>Não há imagem atual para este tópico.</p>
    @endif

    <form action="{{ route('topics.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" class="form-control" value="{{ $topic->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" class="form-control" required>{{ $topic->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $topic->status ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ !$topic->status ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Nova Imagem (opcional):</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div>
            <label>Tags:</label><br>
            @foreach($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                    {{ $topic->tags->contains($tag->id) ? 'checked' : '' }}>
                    {{ $tag->title }}
                </label><br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Atualizar Tópico</button>
    </form>

    <a href="{{ route('topics.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection