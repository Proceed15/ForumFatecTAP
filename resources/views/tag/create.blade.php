<!-- tag/create.blade.php -->
@extends('tag.app')

@section('title', 'Criar Tag')

@section('content')
<div class="form-container">
    <h1>Cadastrar Tag</h1>
    <form id="registration-form" action="{{ route('CreateTagPost') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Tag</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Nome da tag" value="{{ old('title') }}" required>
            @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection