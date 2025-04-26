<?php
require 'conexao.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    
    $stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
    $stmt->execute([$id]);
    $veiculo = $stmt->fetch();

    if (!$veiculo) {
        echo "Veículo não encontrado!";
        exit();
    }
} else {
    echo "ID inválido!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];

   
    $stmt = $pdo->prepare("UPDATE veiculos SET modelo = ?, placa = ? WHERE id = ?");
    if ($stmt->execute([$modelo, $placa, $id])) {
        header("Location: lista_veiculos.php"); // Redireciona para a lista de veículos após a edição
        exit();
    } else {
        echo "Erro ao atualizar o veículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Veículo</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="form-container">
    <h2>Editar Veículo</h2>

    <form method="post">
      <p><strong>Veículo:</strong> <?= htmlspecialchars($veiculo['modelo']) ?>
        (<?= htmlspecialchars($veiculo['placa']) ?>)</p>

      <label for="modelo">Modelo:</label>
      <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($veiculo['modelo']) ?>" required
        class="form-input">

      <label for="placa">Placa:</label>
      <input type="text" id="placa" name="placa" value="<?= htmlspecialchars($veiculo['placa']) ?>" required
        class="form-input">

      <button type="submit" class="btn-submit">Salvar Alterações</button>
      <a href="lista_veiculos.php" class="btn-cancel">Cancelar</a>
    </form>
  </div>
</body>

</html>