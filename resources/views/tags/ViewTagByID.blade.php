@extends('layout.layout')

@section('tagtitle', 'Perfil de Tag')

@section('header', 'Perfil de  Tag')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <tagtitle>Tela de Tag</tagtitle>
    <link href="../forum.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Tag</h2>
            <span>{{ session('message') }}</span>
            @if($tag != null)
            <form action="#" method="post">
                <!-- Criar a ação do Controller: edit-->
              @csrf <!--Tag em PHP para habilitar o Token de acesso-->
              @method('put')
                <div class="input-group">
                    <label for="tagtitle">Título</label>
                    <input type="text" id="tagtitle" name="tagtitle" value="{{ $tag->tagtitle }}" required>
                </div>
                @error('tagtitle') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="tagdescription">Descrição</label>
                    <input type="text" id="tagdescription" name="tagdescription" value="{{ $tag->tagdescription }}" required>
                </div>
                @error('tagdescription') <span>{{ $message }}</span> @enderror
                <div class="input-group">
                    <label for="tagstatus">Status</label>
                    <input type="boolean" id="tagstatus" name="tagstatus">
                </div>
                @error('tagstatus') <span>{{ $message }}</span> @enderror
                <!--<button type="submit">Editar Tag</button>$_COOKIE-->
                <button type="submit">Editar Tag &nbsp;
                <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </form>
            <br />
            <form action="#" method="post">
                <!--Criar a ação do Controller: delete-->
              @csrf <!--Tag em PHP para habilitar o Token de acesso-->
              @method('delete')
              <button class="delete" type="submit">Excluir Tag &nbsp;
                    <i class="fa-solid fa-delete-left"></i>
            </button>
              <!--<button type="submit" value="Excluir">Excluir</button>-->
              <!--<input type="submit" value="Excluir">-->
            </form>
            @endif
        </div>
    </div>
    @endsection
    <style>
        .login-container {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 777px;
            text-align: center;
            color: #fff;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-weight: 500;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .input-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            box-sizing: border-box;
        }

        .input-group input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        button {
            width: 100%;
            padding: 12px 0;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>