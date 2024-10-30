<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página com Layout</title>
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
        margin-left: 220px; /* Ajuste de acordo com a largura da barra lateral */
        padding: 20px;
    }
</style>
</head>
<body>

<header>
    <h1>@yield('header')</h1>
</header>

<nav>
    <ul>
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
        <li><a href="#">Menu 4</a></li>
    </ul>
</nav>

<div class="content">
    @yield('content')
</div>

<footer>
    <p>Rodapé - © 2024</p>
</footer>

</body>
</html>
