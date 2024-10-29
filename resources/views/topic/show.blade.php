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
            <h1>{{ $category->title }}</h1>
            <p>{{ $category->description }}</p>
            
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                @csrf
                @method("delete")
                <a href="{{ route('categories.edit', $category->id) }}" type="button" class="btn btn-secondary">Editar</a>
            
                <input type="submit" value="Excluir" class="btn btn-danger">
            </form>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>