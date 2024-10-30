<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> <!-- O título será substituído pelo valor da seção 'title' -->
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
        <h2>{{ $category->title }}</h2> 
        <p><strong>Descrição:</strong> {{ $category->description }}</p> 

        <div class="action-buttons" style="margin-top: 20px;">
            <form action="{{ route('UpdateCategory', [$category->id]) }}" method="post">
                @csrf
                @method('put')
                <label for="title">Título</label><br>
                <input type="text" id="title" name="title" placeholder="Título" value="{{ $category->title }}" required><br>
                
                <label for="description">Descrição</label><br>
                <textarea id="description" name="description" placeholder="Descrição" required>{{ $category->description }}</textarea><br>

                <input type="submit" value="Editar" id="submit-button" class="btn btn-warning">
            </form>

            <form action="{{ route('DeleteCategory', [$category->id]) }}" method="post" style="display:inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</button>
            </form>
        </div>

    </div>
</div>

<footer>
    <p>Rodapé - © 2024</p>
</footer>

</body>
</html>