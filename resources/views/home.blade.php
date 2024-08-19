@extends('layout.layout')


<!DOCTYPE html>

<html lang="en">
 <head>
 <meta charset="UTF-8">
 <title>Home Page</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <meta name="description" content="" />
 <meta name="keywords" content="" />
 </head>

 @section('content')
 <!-- Body -->
 <body id="body">
<div class="header">
<h1>O Fórum</h1>
 <a href="/">Bem vindo a Home Page de nosso site!</a>
 <br></br>
 <a href="/topics">Veja uma Publicação</a>
 <br></br>
 @if(Auth::check())
 <a href="{{ route('listUsersByID', Auth::user()->id) }}">Veja seu Perfil</a>
 @else
 <a href="/login">Logue-se</a></li>
 <br></br>
 <a href="/register" class="button special">Registre-se</a>
 @endif
 <br></br>
</div>
<div class="container">
    <h2>Tópicos recentes</h2>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Status </td>
        <tr>
            <td> PHP? Atualmente? </td>
            <td> Por que Usar PHP em 2024? Beneficios Principais </td>
            <td> 1 </td>
        </tr>
        <tr>
            <td> Inteligências Artificiais Inovadoras</td>
            <td> Como as novas formas de se utilizar IA's para criação de conteúdo digital vêm inovando </td>
            <td> 1 </td>
        </tr>
        <tr>
            <td> React vs Laravel</td>
            <td> Qual a melhor ferramenta </td>
            <td> 1 </td>
        </tr>
        </tr>
    </table>
</div>
</body>
@endsection

</html>