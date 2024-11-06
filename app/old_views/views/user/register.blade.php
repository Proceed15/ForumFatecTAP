<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>register</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .register-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    padding: 40px;
    width: 300px;
  }
  h2 {
    text-align: center;
    margin-bottom: 30px;
  }
  input[type="text"], input[type="email"], input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>
  <div class="register-container">
    <h2>Registre-se</h2>
    <form action="{{ route('register') }}" method="post">
      @csrf
      <input type="text" id="name" name="name" placeholder="Nome"
                    value="{{ old('name') }}" required>
      @error('name') <span>{{ $message }}</span> @enderror
      <input type="email" id="email" name="email" placeholder="E-mail" 
                    value="{{ old('email') }}" required>
      @error('email') <span>{{ $message }}</span> @enderror
      <input type="password" id="password" name="password" placeholder="Senha" 
                    required>
      @error('password') <span>{{ $message }}</span> @enderror
      <input type="password" id="password_confirmation" 
                    name="password_confirmation" placeholder="Senha" required>
      <input type="submit" value="Registrar">
    </form>
  </div>
</body>
</html>
