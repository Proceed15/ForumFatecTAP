@extends('tag.app')

@section('title', 'Editar Tag')

@section('header', 'Editar Tag')

@section('content')
<div class="form-container">
<form action="{{ route('UpdateTag', ['tid' => $tag->id]) }}" method="post">
    @csrf
    @method('PUT') <!-- Para indicar que é uma requisição PUT -->
    <div class="form-group">
        <label for="title">Tag</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $tag->title) }}" required>
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
</div>
@endsection