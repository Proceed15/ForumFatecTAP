@extends('topics.app')
@extends('layouts.style')

@section('title', 'Listar os Tópicos')

@section('content')
<h1 class="header-title">Todos os Tópicos</h1>
    <div class="header-container mb-4">
        <a href="{{ route('CreateTopic') }}" class="btn btn-primary">Criar Novo Tópico</a>
    </div>
    @if($topics->isEmpty())
        <div class="alert alert-warning" role="alert">
            Nenhum tópico encontrado.
        </div>
    @else
        <div class="row">
            @foreach ($topics as $topic)
                <div class="col-md-6 mb-4"> <!-- Aumentando a largura para 6 colunas -->
                    <div class="card bg-purple text-white" style="height: 180px;"> <!-- Aumentando a altura -->
                        <div class="card-body d-flex flex-row justify-content-between align-items-center"> <!-- Usando flex-row para layout lateral -->
                            <div class="flex-grow-1">
                                <h5 class="card-title">
                                    <a href="{{ route('topics.show', $topic->id) }}" class="text-white">{{ $topic->title }}</a>
                                </h5>
                                <p class="card-text description">Descrição: {{ $topic->description }}</p> <!-- Mantendo a descrição -->
                                <p class="card-text">Status: <strong>{{ $topic->status ? 'Ativo' : 'Inativo' }}</strong></p>
                            </div>
                            <div class="text-right"> <!-- Alinhando à direita -->
                                <p>Categoria: 
                                    <span class="badge badge-light">{{ $topic->category->title ?? 'Sem Categoria' }}</span>
                                </p>
                                <p>Tags: 
                                    @if($topic->tags && $topic->tags->isNotEmpty())
                                        @foreach ($topic->tags as $tag)
                                            <span class="badge badge-light">{{ $tag->title }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Nenhuma tag</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="mt-auto d-flex justify-content-center"> <!-- Centralizando os botões -->
                            <a href="{{ route('topics.edit', $topic->id) }}" class="btn-editar">Editar</a>
                            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir este tópico?');">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

<style>
    .bg-purple {
        background-color: #6f42c1 !important; /* Cor roxa */
    }
    .card-text.description {
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Limita a duas linhas */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis; /* Adiciona reticências quando o texto é cortado */
    }
    /* Classe base para os botões no card */
    .card-body .btn {
    width: 100px;
    height: 37px; /* Ajuste a altura dos botões */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease, opacity 0.3s ease; /* Transição suave para a mudança de cor e transparência */
    }

    /* Botão de Editar */
    .btn-editar {
    background-color: #f39c12; /* Cor laranja */
    color: white; /* Texto branco */
    }

    /* Botão de Excluir */
    .btn-deletar {
    background-color: #e74c3c; /* Cor vermelha */
    color: white; /* Texto branco */
    }

/* Efeito de transformação ao passar o mouse nos botões */
    .btn-editar:hover {
    background-color: #e67e22; /* Laranja mais escuro */
    opacity: 0.8; /* Tornar o botão um pouco transparente */
    }

    .btn-deletar:hover {
    background-color: #c0392b; /* Vermelho mais escuro */
    opacity: 0.8; /* Tornar o botão um pouco transparente */
    }

</style>
@endsection
