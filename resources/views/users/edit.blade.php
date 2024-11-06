@extends('layouts.header_footer')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2 class="text-center">Editar Usuário</h2>
    <form action="" method="POST" class="w-50">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
    
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
    
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control">
        </div>
    
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>
@endsection
