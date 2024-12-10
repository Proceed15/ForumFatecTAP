@extends('category.app')

@section('title', 'Cadastrar Categoria')

@section('content')
<p>Espaço</p>
<a>Espaço</a>
<div class="container">
    <h1 class="my-4 text-center">Cadastrar Categoria</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('createCategory') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Categoria</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Nome da Categoria" value="{{ old('title') }}" required>
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Descrição da Categoria" rows="4">{{ old('description') }}</textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route('listCategories') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection