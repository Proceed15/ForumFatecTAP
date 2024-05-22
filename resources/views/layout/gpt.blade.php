<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Lateral</title>
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
  </style>
</head>
<body>
    <Header>
        <h1>@yield('header')</h1>
    </Header>
 
  <div class="sidebar">
    <h2>Menu</h2>
    <a href="#">Home </a>
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