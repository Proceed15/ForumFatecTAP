<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação Categoria</title>
    <style>
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
        }
        label, input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        #submit-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Cadastrar Categoria</h1>
    <form id="registration-form" action="{{ route('CreateCategory') }}" method="post">
        @csrf
        <label for="category">Categoria</label>
        <input type="text" id="title" name="title" placeholder="Nome da Categoria" value="{{ old('title') }}" required>
        @error('title') <span class="error">{{ $message }}</span> @enderror

        <label for="description">Descrição</label>
        <textarea id="description" name="description" placeholder="Descrição da Categoria" rows="4">{{ old('description') }}</textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror

        <input type="submit" value="Cadastrar" id="submit-button">
    </form>
</div>

</body>
</html>