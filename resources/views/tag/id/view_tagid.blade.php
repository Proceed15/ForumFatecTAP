<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f5ff; /* Azul claro para o fundo */
        }
        header {
            background-color: #007bff; /* Azul */
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #e7f0ff; /* Azul claro */
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            padding: 10px;
            border-bottom: 1px solid #ccdfff; /* Azul claro para a borda */
        }
        footer {
            background-color: #007bff; /* Azul */
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>@yield('header')</h1> 
</header>


<div class="content">
<div style="margin-top: 20px;">
        <h2>{{ $tag->title }}</h2> 

        <div class="action-buttons" style="margin-top: 20px;">
            <form action="{{ route('UpdateTag', [$tag->id]) }}" method="post">
                @csrf
                @method('put')
                <label for="title">Título</label>
                <input type="text" id="title" name="title" placeholder="Título" value="{{ $tag->title }}" required>
                
                <input type="submit" value="Editar" id="submit-button" class="btn btn-warning">
            </form>
            <form action="{{ route('DeleteTag', [$tag->id]) }}" method="post" style="display:inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta tag?');">Deletar</button>
            </form>
        </div>

    </div>
</div>

<footer>
    <p>Rodapé - © 2024</p>
</footer>

</body>
</html>