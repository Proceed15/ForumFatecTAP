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
 
 <!-- Header -->
 <header id="header">
 <h1><a href="/">Fórum</a></h1>
 <li><a href="/">Bem vindo a Home Page de nosso site!</a></li>
 @if(Auth::check())
 <li><a href="{{ route('listUsersByID', $authUser) }}">Veja seu Perfil</a></li>
 @endif
 <li><a href="/topics">Veja uma Publicação Aleatória</a></li>
 <li><a href="/login">Logue-se</a></li>
 <li><a href="/register" class="button special">Registre-se</a></li>
 </header>

 @section('content')
 <!-- Body -->
 <body id="body">
<div class="container">
    <h3>Tópicos recentes</h3>
    <table border="10">
        <tr>
            <td> Nome </td>
            <td> Descrição </td>
            <td> Status </td>
        </tr>
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
    </table>
</div>
</body>
@endsection

</html>