@extends('topics.app')
@extends('layouts.styles')

@section('title', 'Listar os Tópicos')

@section('content')
<div class="container mt-5">
    <div class="header-container mb-4">
        <h2 class="header-title">Todos os Tópicos</h2>
        <a href="{{ route('CreateTopic') }}" class="btn btn-primary">Criar Novo Tópico</a>
    </div>

    @if($topics->isEmpty())
        <div class="alert alert-warning" role="alert">
            Nenhum tópico encontrado.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Categoria</th>
                    <th>Tags</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $topic)
                    <tr>
                        <td>
                            <a href="{{ route('topics.show', $topic->id) }}" class="text-primary">{{ $topic->title }}</a>
                        </td>
                        <td>{{ $topic->description }}</td>
                        <td>{{ $topic->status ? 'Ativo' : 'Inativo' }}</td>
                        <td>
                            <span class="badge badge-info">{{ $topic->category->title ?? 'Sem Categoria' }}</span>
                        </td>
                        <td>
                            @if($topic->tags && $topic->tags->isNotEmpty())
                                @foreach ($topic->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->title }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Nenhuma tag</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este tópico?');">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection