<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum - Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="d-flex justify-content-center">
        <div class="col-6 p-5">
            <h1>Categorias</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-secondary">
                        Adicionar
                    </a>
            <br />
            <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    <a href="{{ route('categories.show', $category->id) }}">
                        {{ $category->title }}
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>