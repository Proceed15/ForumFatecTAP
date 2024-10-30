<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação Tag</title>
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
    <h1>Cadastrar Tag</h1>
    <form id="registration-form" action="{{ route('CreateTag') }}" method="post">
        @csrf


        <label for="tag">Tag</label>
        <input type="text" id="title" name="title" placeholder="Nome da tag" value="{{ old('title') }}" required>
        @error('title') <span class="error">{{ $message }}</span> @enderror

        <input type="submit" value="Cadastrar" id="submit-button">
    </form>
</div>

</body>
</html>