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
            background-color: #f0f5ff;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #e7f0ff;
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
            border-bottom: 1px solid #ccdfff; 
        }
        footer {
            background-color: #007bff;
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
    @yield('content') 
</div>

<footer>
    <p>Rodapé - © 2024</p>
</footer>

</body>
</html>