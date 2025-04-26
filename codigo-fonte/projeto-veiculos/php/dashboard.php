<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require 'conexao.php';


if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}


$usuario_id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare('SELECT * FROM veiculos WHERE usuario_id = ?');
$stmt->execute([$usuario_id]);
$veiculos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <h2>Bem-vindo à sua garagem</h2>

    <h3>Seus Veículos:</h3>
    <a href="veiculos.php"><button>Cadastrar Veículo</button></a>
    <a href="lista_veiculos.php"><button>Ver Lista de Veículos</button></a>

    <h3>Manutenção:</h3>
    <a href="adicionar_manutencao.php"><button>Registrar Manutenção</button></a>
    <a href="lista_manutencoes.php"><button>Ver Manutenções</button></a>

    <h3>Abastecimento:</h3>
    <a href="adicionar_abastecimento.php"><button>Registrar Abastecimento</button></a>
    <a href="lista_abastecimentos.php"><button>Ver Abastecimentos</button></a>

    <h3>Relatórios:</h3>
    <a href="relatorio_consumo.php"><button>Relatório de Consumo</button></a>


    <a href="/index.php" class="btn-voltar">Voltar para a Tela Inicial</a>
  </div>
</body>

</html>