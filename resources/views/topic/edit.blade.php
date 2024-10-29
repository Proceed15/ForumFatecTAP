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
            <h1>Cadastro de Categorias</h1>
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" value="{{ $category->title }}" class="form-control" />

                <label for="description" class="form-label">Descrição</label>
                <input type="text" name="description" id="description" value="{{ $category->description }}" class="form-control" />

                <input type="submit" value="Alterar" class="mt-4 btn btn-secondary">
            </form>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>