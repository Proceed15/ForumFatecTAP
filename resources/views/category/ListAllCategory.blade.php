@extends('category.view_category')

@section('title', 'Visualizar Categorias')

@section('header', 'Listar Todas as Categorias') 

@section('content')
    <table border="1" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td><a href="{{ route('showCategory', $category->id) }}">{{ $category->title }}</a></td>
                    <td>{{ $category->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection