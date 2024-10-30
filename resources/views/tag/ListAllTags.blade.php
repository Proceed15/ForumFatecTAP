@extends('tag.view_tag')

@section('title', 'Visualizar Tags')

@section('header', 'Listar Todas as Tags')

@section('content')
    <table border="1" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Título</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)  
                <tr>
                    <td><a href="{{ route('showTag', $tag->id) }}">{{ $tag->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection