<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM veiculos ORDER BY id ASC");
$veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar veículos</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="containerv">
    <h1>Listar Veículos</h1>

    <?php if (count($veiculos) > 0): ?>
    <table class="veiculos-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Modelo</th>
          <th>Placa</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($veiculos as $veiculo): ?>
        <tr>
          <td><?= htmlspecialchars($veiculo['id']) ?></td>
          <td><?= htmlspecialchars($veiculo['modelo']) ?></td>
          <td><?= htmlspecialchars($veiculo['placa']) ?></td>
          <td>
            <a href="editar.php?id=<?= urlencode($veiculo['id']) ?>" class="btn-edit">Editar</a> |
            <a href="excluir.php?id=<?= urlencode($veiculo['id']) ?>" class="btn-delete"
              onclick="return confirm('Tem certeza que deseja excluir este veículo?')">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <p class="mensagem-vazia">Nenhum veículo cadastrado no momento.</p>
    <?php endif; ?>

    <a href="dashboard.php" class="btn-back">Voltar ao Dashboard</a>
  </div>
</body>

</html>