<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>register</title>
<link rel="stylesheet" href="../forum.css">
</head>
<body>
  <div class="register-container">
    <h2>Perfil</h2>
    <span>{{ session('message') }}</span>
    @if($user != null)
    <form action="{{ route('UpdateUser', [$user->id]) }}" method="post">
      @csrf
      @method('put')
      <input type="text" id="name" name="name" placeholder="Nome"
                    value="{{ $user->name }}" required>
      @error('name') <span>{{ $message }}</span> @enderror
      <input type="email" id="email" name="email" placeholder="E-mail" 
                    value="{{ $user->email }}" required>
      @error('email') <span>{{ $message }}</span> @enderror
      <input type="password" id="password" name="password" placeholder="Senha">
      @error('password') <span>{{ $message }}</span> @enderror
      <input type="submit" value="Atualizar">
    </form>
    <br />
    <form action="{{ route('DeleteUser', [$user->id]) }}" method="post">
      @csrf
      @method('delete')
      <input type="submit" value="Excluir">
    </form>
    @endif    
  </div>
</body>
</html>
