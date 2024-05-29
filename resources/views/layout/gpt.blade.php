<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #4CAF50;
      padding: 20px;
      color: white;
      text-align: center;
    }

    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #007bff; /* azul claro */
      padding-top: 20px;
    }

    .sidebar h2 {
      color: #fff;
      text-align: center;
    }

    .sidebar a {
      padding: 10px;
      text-decoration: none;
      font-size: 18px;
      color: #fff;
      display: block;
    }

    .sidebar a:hover {
      background-color: #0056b3; /* azul mais escuro */
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }

    footer {
      background-color: #007bff; /* azul claro */
      color: #fff;
      text-align: center;
      position: fixed;
      width: 100%;
      bottom: 0;
      padding: 10px 0;
    }

    .container {
      background: linear-gradient(135deg, #6e8efb, #a777e3);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      text-align: center;
      color: #fff;
      margin: 0 auto;
    }

    .container h2 {
      margin-bottom: 20px;
      font-weight: 500;
    }

    .user-list {
      text-align: left;
    }

    .user-list ul {
      list-style-type: none;
      padding: 0;
    }

    .user-list li {
      background: rgba(255, 255, 255, 0.1);
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
    <header>
        <h1>@yield('header')</h1>
    </header>
 
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="#">Home</a>
        <a href="#">Blog</a>
        <a href="#">Contato</a>
    </div>
 
    <div class="content">
        @yield('content')
    </div>
 
    <footer>
        <p>Rodapé - © 2024</p>
    </footer>
</body>
</html>
