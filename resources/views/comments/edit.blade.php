<!-- resources/views/comments/edit.blade.php Funcional -->

@extends('comments.app')
@extends('layouts.layout')
@section('content')
<p>Espaço</p>
<p>Espaço</p>
    <h2>Editar Comentário</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Comentário</label>
            <textarea name="content" id="content" class="form-control" required>{{ $comment->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Comentário</button>
    </form>

    <a href="{{ route('topics.show', $comment->topic_id) }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection