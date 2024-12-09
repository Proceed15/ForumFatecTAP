@extends('layouts.layout')
@extends('layouts.app')
@section('content')
<title>Tela de Perfil</title>
<style>
    .profile-container {
        background: linear-gradient(135deg, #f0f4f8, #a777e3);
        position: absolute;
        top: 66%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 37px;
        border-radius: 15px;
        color: #0744f9;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 444px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .profile-header .user-icon {
        width: 222px;
        height: 222px;
        border-radius: 100%;
        background-color: #D0C9C9;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #808080;
        font-size: 36px;
        position: relative;
        margin-top: 10px;
    }
    .profile-header input[type="file"] {
        display: none;
    }
    .profile-header label {
        cursor: pointer;
    }
    .profile-fields {
        margin-top: 5px;
        width: 90%;
    }
    label {
        display: block;
        margin-bottom: 4px;
        font-size: 14px;
    }
    input {
        padding: 10px;
        border: none;
        outline: none;
        font-size: 15px;
        width: calc(100% - 30px);
        margin-bottom: 20px;
        background-color: #D0C9C9;
        border-radius: 5px;
    }
    button, input[type="submit"] {
        background-color: #0f33ff;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 10px;
        color: white;
        font-size: 15px;
        cursor: pointer;
    }
    button:hover, input[type="submit"]:hover {
        background-color: #ff0f0f;
    }
    .action-buttons {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 10px;
    }
    .action-buttons form {
        flex: 1;
        margin: 0 5px;
    }
    .action-buttons input[type="submit"] {
        padding: 15px;
        font-size: 15px;
    }
    .error {
        color: red;
        font-size: 12px;
    }
    @media screen and (max-width: 900px) {
        .profile-header {
            flex-direction: column;
            align-items: center;
        }
        .profile-header .user-icon {
            position: static;
            margin-top: 100px;
        }
        .profile-container {
            text-align: center;
            padding-top: 200px;
        }
        .profile-header h1 {
            position: static;
            transform: none;
            background-color: darkblue;
            color: #D9D9D9;
            padding: 0;
            font-size: 18px;
        }
    }
    body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f4f8;
        }
        .container {
            margin-top: 70px;
        }
        .topic {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
        .topic:hover {
            background-color: #e9ecef;
        }
        .topic h2 {
            margin: 0 0 5px;
            font-size: 18px;
            color: #007bff;
        }
        .topic p {
            margin: 5px 0;
            color: #495057;
        }
        .meta {
            text-align: right;
            font-size: 14px;
            color: #6c757d;
        }
        .badge {
            margin-right: 5px;
        }
</style>
<body>
    <div class="profile-container">
        <h1>Perfil</h1>
        <span>{{ session('message') }}</span>
        @if($user != null)
        <form id="registration-form" action="{{ route('UpdateUser', [$user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="profile-fields">
            @if ($user->photo)
                <div class="profile-header">
                    <p><strong>Imagem Atual</strong></p>
                    <img src="{{ url('/storage/' . $user->photo) }}" alt="Imagem de Perfil Atual" class="user-icon">
                </div>
                @else
                    <p>Sem Foto de Perfil</p>
                @endif

                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Nome" value="{{ $user->name}}" required>
                @error('name') <span class="error">{{ $message }} </span> @enderror

                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail" value="{{ $user->email}}" required>
                @error('email') <span class="error">{{ $message }} </span> @enderror

                <label for="photo">Nova Imagem (opcional)</label>
                <input type="file" name="photo" class="form-control-file" accept="image/*">

                <label for="password">Nova Senha (opcional)</label>
                <input type="password" id="password" name="password" placeholder="Senha">
                @error('password') <span class="error">{{ $message }} </span> @enderror

                <label for="password_confirmation">Confirmar a Nova Senha (opcional)</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Senha de Confirmação" required>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="action-buttons">
                <form id="edit-form" action="{{ route('UpdateUser', [$user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="submit" value="Editar" id="submit-button">
                </form>
                <form id="delete-form" action="{{ route('DeleteUser', [$user->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Deletar" id="delete-button">
                </form>
            </div>
        </form>
        @endif
    </div>
</div>
</body>
</html>
@endsection