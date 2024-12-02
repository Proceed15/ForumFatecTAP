<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Tópico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #717CA3;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #D9D9D9;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 120px;
        }
        .navbar {
            background-color: #6D6565;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            width: 100%;
            position: fixed;
            top: 0;
        }
        .navbar .brand {
            display: flex;
            align-items: center;
            color: white;
            font-size: 20px;
            padding: 20px 0;
        }
        .navbar .menu {
            display: flex;
        }
        .navbar .menu a {
            display: block;
            color: white;
            text-align: center;
            padding: 20px 50px;
            text-decoration: none;
        }
        .navbar .menu a:hover {
            background-color: #656E8F;
            color: white;
        }
        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .navbar li {
            margin-left: 15px;
        }
        .topic-header {
            margin-bottom: 20px;
        }
        .topic-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .topic-content {
            margin-bottom: 10px;
            color: #333;
        }
        .topic-meta {
            margin-bottom: 10px;
            color: #666;
        }
        .topic-text {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .button.edit {
            background-color: #656E8F;
        }
        .button.like {
            background-color: #3498db;
            margin-left: 10px;
        }
        .button.dislike {
            background-color: #e74c3c;
            margin-left: 10px;
        }
        .button.comment {
            background-color: #656E8F;
        }
        .comment {
            background-color: #EFEFEF;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
        }
        .comment p {
            margin-bottom: 5px;
        }
        .navbar {
            background-color: #6D6565;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }
        .navbar .brand {
            display: flex;
            align-items: center;
            color: white;
            font-size: 20px;
            padding: 20px 0;
        }
        .navbar .menu {
            display: flex;
        }
        .navbar .menu a {
            display: block;
            color: white;
            text-align: center;
            padding: 20px 50px;
            text-decoration: none;
        }
        .navbar .menu a:hover {
            background-color: #656E8F;
            color: white;
        }
        textarea {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
            resize: none;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">For1</div>
        <div class="menu">
        <ul>
                <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Tópicos</a>
                @auth
                    <li><a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Perfil</a></li>
                    <li><a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="topic-header">
        <h1>Visualizar Tópico(obs não aponta para as paginas certas)</h1>
            <div class="topic-title">Nome do Título</div>
            <div class="topic-content">Nome do Conteúdo</div>
            <div class="topic-meta">
                <p>Tag: <span>tag1</span></p>
                <p>Categoria: <span>Categoria1</span></p>
            </div>
            <div class="topic-text">
                Texto do Conteúdo: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
            <div>
                <button class="button edit">Editar</button>
                <button class="button like"><i class="fas fa-thumbs-up"></i> Like</button>
                <button class="button dislike"><i class="fas fa-thumbs-down"></i> Dislike</button>
                <span>0</span> Likes
                <span>0</span> Deslikes
            </div>
        </div>
        <div class="comments">
            <h2>Adicionar Comentário</h2>
            <form id="commentForm">
                <textarea rows="4" placeholder="Digite seu comentário aqui..." required></textarea><br>
                <button type="submit" class="button">Enviar Comentário</button>
            </form>
            <div class="comment">
                <p><strong>Usuário:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p><strong>Data:</strong> 1 de Janeiro de 2024</p>
            </div>
        </div>
    </div>
</body>
</html>