@extends('topics.app')
@extends('layouts.styles')

@section('title', 'Listar os Tópicos')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div class="container">
    <!--
    <a>a</a>
    <p>a</p>
-->
    <div class="header-container">
    <h2 class="header-title">Todos os Tópicos</h2>
    </div>
    <a href="{{ route('CreateTopic') }}" class="custom-btn">Criar Novo Tópico</a>
    @if($topics->isEmpty())
        <div class="alert alert-warning" role="alert">
            Nenhum tópico encontrado.
        </div>
    @else
        @foreach ($topics as $topic)
            <div class="topic">
                <a href="{{ route('topics.show', $topic->id) }}">
                    <h3>{{ $topic->title }}</h3>
                </a>
                <p>Descrição: {{ $topic->description }}</p>
                <p>Status: {{ $topic->status ? 'Ativo' : 'Inativo' }}</p>
                
                <!-- Exibindo Categorias -->
                <p>Categoria: 
                    <!--
                    @if($topic->categories && $topic->categories->isNotEmpty())
                        @foreach ($topic->categories as $category)
                            <span class="badge badge-info">{{ $category->title }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">Nenhuma categoria</span>
                    @endif
                    -->
                    <span class="badge badge-info">{{ $topic->category->title ?? 'Sem Categoria' }}</span>
                </p>

                <!-- Exibindo Tags -->
                <p>Tags: 
                    @if($topic->tags && $topic->tags->isNotEmpty())
                        @foreach ($topic->tags as $tag)
                            <span class="badge badge-info">{{ $tag->title }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">Nenhuma tag</span>
                    @endif
                </p>

                <div class="actions">
                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este tópico?');">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>


@endsection
