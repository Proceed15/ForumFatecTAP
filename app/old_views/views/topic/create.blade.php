<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum - Tópicos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="d-flex justify-content-center">
        <div class="col-6 p-5">
            <h1>Cadastro de Tópicos</h1>
            <form action="{{ route('topics.store') }}" method="post">
                @csrf
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" />
                @error('title') <span>{{ $message }}</span> <br /> @enderror

                <label for="description" class="form-label">Descrição</label>
                <input type="text" name="description" id="description" class="form-control" />
                @error('description') <span>{{ $message }}</span> <br /> @enderror

                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" id="status" class="form-control" />
                @error('status') <span>{{ $message }}</span> <br /> @enderror

                <label for="image" class="form-label">Imagem</label>
                <input type="text" name="image" id="image" class="form-control" />
                @error('image') <span>{{ $message }}</span> <br /> @enderror

                <label for="category" class="form-label">Categoria</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

                <input type="submit" value="Cadastrar" class="mt-4 btn btn-secondary">
            </form>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>