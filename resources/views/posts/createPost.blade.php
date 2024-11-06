@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
@section('content')
<div class="container">
    <h1>Create New Tag</h1>
    <form action="{{ route('storeTopic') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Id</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Titulo</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Topic</button>
    </form>
</div>
@endsection