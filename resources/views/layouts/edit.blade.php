<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tela de Editar Perfil</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .container {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    max-width: 100%;
    text-align: center;
  }
  h1 {
    color: #4CAF50;
  }
  input[type="text"],
  input[type="tel"],
  input[type="email"],
  input[type="password"],
  input[type="submit"],
  #datepicker {
    width: calc(100% - 20px);
    padding: 15px;
    margin: 20px 0 10px;
    border: none;
    border-radius: 10px;
    box-sizing: border-box;
    background-color: #f0f0f0;
    font-size: 16px;
    color: #333;
  }
  input[type="text"],
  input[type="tel"],
  input[type="email"],
  input[type="password"] {
    padding-left: 17px;
    background-repeat: no-repeat;
    background-position: 10px center;
    background-size: 20px 20px;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
  }
  .user-button {
    background-color: #f0f0f0;
    color: #333;
    border: none;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    font-size: 30px;
    cursor: pointer;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    overflow: hidden;
    position: relative;
  }
  .user-button i {
    position: absolute;
    z-index: 1;
  }
  .user-button img {
    max-width: 100%;
    max-height: 100%; 
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
  }
</style>
</head>
<body>
<div class="container">
  <h1>Editar Perfil</h1>
  
  <form id="registration-form">
    <input type="text" placeholder="Nome" disabled="">
    <input type="password" placeholder="Senha" required>
    <input type="email" placeholder="Email" disabled="">
    <input type="text" id="datepicker" placeholder="Data de Nascimento" disabled="" title="Preencher o campo">
    <input type="submit" value="Salvar" id="submit-button">
  </form>
  <input type="file" id="file-input" style="display: none;">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "dd/mm/yy",
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      maxDate: "+0",
      monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
      dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
      onSelect: function(dateText) {
        this.value = dateText;
      }
    });
  });
  document.getElementById("user-button").addEventListener("click", function() {
    document.querySelector('input[type="file"]').click();
  });
  document.querySelector('input[type="file"]').addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        document.getElementById("user-button").querySelector('img').src = reader.result;
        document.getElementById("user-button").querySelector('i').style.display = "none";
      }
      reader.readAsDataURL(file);
    }
  });
</script>
</body>
</html>