@extends('layouts.header_footer')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2 class="text-center">Encontrar Usuário</h2>
    <form action="" method="POST" class="text-center mb-4">
        @csrf
        <label for="nome">Digite o id do usuário</label><br>
        <input type="number" id="id_user" name="id_user" class="form-control mb-2" style="max-width: 300px; margin: 0 auto;">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
    <div class="user-list">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Alice</h5>
                        <p class="card-text">alice@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
