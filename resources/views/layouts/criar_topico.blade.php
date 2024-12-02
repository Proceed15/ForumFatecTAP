<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tópico</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #717CA3;
            margin: 0;
        }
        .navbar {
            background-color: #6D6565;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
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
        .login-container {
            background-color: #D9D9D9;
            position: absolute;
            top: 53%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 15px;
            color: #000;
            width: 80%;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input, select {
            padding: 12px;
            border: none;
            outline: none;
            font-size: 15px;
            width: calc(100% - 24px);
            margin-bottom: 10px;
            background-color: #D0C9C9;
        }
        textarea {
            padding: 12px;
            border: none;
            outline: none;
            font-size: 15px;
            width: calc(100% - 24px);
            margin-bottom: 10px;
            background-color: #D0C9C9;
            resize: none;
            height: 50px;
        }
        button {
            background-color: #656E8F;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            margin-top: 10px;
        }
        button.back-button {
            background-color: #656E8F;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover {
            background-color: #656E8F;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">For1</div>
        <div class="menu">
            <a href="Tópicos.html">Tópicos</a>
            <a href="Perfil.html">Perfil</a>
            <a href="Sair.html">Sair</a>
        </div>
    </nav>
    <div class="login-container">
        <h1>Criar Tópico(obs não aponta para as paginas certas)</h1>
        <label for="titulo"></label>
        <input type="text" id="titulo" placeholder="Título">
        <label for="tags"></label>
        <select id="tags">
            <option value="tag1">Tag1</option>
            <option value="tag2">Tag2</option>
            <option value="tag3">Tag3</option>
            <option value="tag4">Tag4</option>
        </select>
        <label for="categoria"></label>
        <select id="categoria">
            <option value="categoria1">Categoria1</option>
            <option value="categoria2">Categoria2</option>
            <option value="categoria3">Categoria3</option>
            <option value="categoria4">Categoria4</option>
        </select>
        <label for="conteudo"></label>
        <textarea id="conteudo" placeholder="Conteúdo"></textarea>
        <button>Voltar</button>
        <button class="back-button">Criar</button>
    </div>
</body>
</html>