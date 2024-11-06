@extends('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container-users">
        <div class="users-list">
            <h2>Users List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-edit"><i class="fa-solid fa-head-side-cough-slash"></i> Suspender</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i
                                        class="fa-solid fa-user-slash"></i> Banir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="banModalLabel">Banir Usuario</h5>
                        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja banir este usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"><i
                                class="fa-solid fa-rotate-left"></i> Voltar</button>
                        <button type="button" class="btn btn-danger"><i class="fa-solid fa-user-slash"></i> Confirmar
                            Banimento</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

