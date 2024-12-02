@extends('comments.app')
@extends('layours.layout');

@section('content')
    <h1>Comentários</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('comments.store', $topic->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Comentário</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Comentário</button>
    </form>

    <h2>Lista de Comentários</h2>
    <ul>
        @foreach($comments as $comment)
            <li>
                {{ $comment->content }}
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
    <ul class="list-group mt-3">
    @foreach($comments as $comment)
        <li class="list-group-item">
            {{ $comment->content }}
            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm float-right">Editar</a>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm float-right mr-2">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection