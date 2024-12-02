@extends('tag.StylesShow')

@section('title', 'Detalhes da Tag')

@section('header', 'Detalhes da Tag')

@section('content')
<div class="topic">
    <div class="card-body">
        <h5 class="card-title">{{ $tag->title }}</h5>
        <p class="card-text">ID da tag: {{ $tag->id }}</p>
        <a href="{{ route('editTag', $tag->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('DeleteTag', [$tag->id]) }}" method="post" style="display:inline;">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta tag?');">Deletar</button>
        </form>
        <a href="{{ route('ListAllTags') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection