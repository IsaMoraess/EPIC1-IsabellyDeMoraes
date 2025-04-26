<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario_nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Dashboard</title>
</head>

<body>
  <div class="dashboard-container">
    <header>
      <h1>Bem-vindo, <?= htmlspecialchars($nome_usuario) ?>!</h1>
      <p>Aqui você pode gerenciar seus veículos, manutenções e abastecimentos.</p>
    </header>

    <nav>
      <ul>
        <li><a href="php/veiculos.php">Gerenciar Veículos</a></li>
        <li><a href="php/manutencao.php">Gerenciar Manutenções</a></li>
        <li><a href="php/abastecimento.php">Registrar Abastecimento</a></li>
      </ul>
    </nav>
  </div>
</body>

</html>