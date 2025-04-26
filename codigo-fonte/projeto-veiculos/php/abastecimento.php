<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>ABASTECIMENTO</title>
</head>
<body>
    
</body>
</html>


<?php
require 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["veiculo_id"], $_POST["dados"], $_POST["litros"], $_POST["custo_total"], $_POST["km_atual"])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header("Location: formulario_abastecimento.php");
        exit;
    }

    $veiculo_id = intval($_POST["veiculo_id"]);
    $dados = trim($_POST["dados"]);
    $litros = floatval($_POST["litros"]);
    $custo_total = floatval($_POST["custo_total"]);
    $km_atual = intval($_POST["km_atual"]);

    if ($litros <= 0 || $custo_total <= 0 || $km_atual <= 0) {
        $_SESSION['mensagem'] = "Valores inválidos!";
        header("Location: formulario_abastecimento.php");
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO abastecimentos (veiculo_id, dados, litros, custo_total, km_atual) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$veiculo_id, $dados, $litros, $custo_total, $km_atual]);

        $_SESSION['mensagem'] = "Abastecimento registrado com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao registrar abastecimento: " . $e->getMessage();
    }

    header("Location: formulario_abastecimento.php");
    exit;
}
?>
