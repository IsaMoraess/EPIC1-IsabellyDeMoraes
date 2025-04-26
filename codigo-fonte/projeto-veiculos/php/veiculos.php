<?php
session_start();
require 'conexao.php';


if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];
    $km_atual = $_POST['km_atual'];

    
    $stmt = $pdo->prepare("INSERT INTO veiculos (usuario_id, modelo, ano, placa, km_atual) VALUES (?, ?, ?, ?, ?)");

    if ($stmt->execute([$usuario_id, $modelo, $ano, $placa, $km_atual])) {
        echo "<p class='success'>Veículo cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Erro ao cadastrar veículo. Tente novamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Veículos</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="form-containercds">
    <h2>Cadastro de Veículos</h2>

    <form action="veiculos.php" method="POST">
      <div class="input-group">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" class="form-input" required>
      </div>

      <div class="input-group">
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" class="form-input" required>
      </div>

      <div class="input-group">
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" class="form-input" required>
      </div>

      <div class="input-group">
        <label for="km_atual">Quilometragem Atual:</label>
        <input type="number" name="km_atual" id="km_atual" class="form-input" required>
      </div>

      <button type="submit">Cadastrar</button>
    </form>

    <a href="dashboard.php" class="btn-back">Voltar ao Dashboard</a>
  </div>
</body>

</html>