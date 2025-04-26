<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM veiculos WHERE id = ?");
    if ($stmt->execute([$id])) {
        echo "Veículo excluído com sucesso!";
        header("Location: lista_veiculos.php"); 
        exit();
    } else {
        echo "Erro ao excluir veículo.";
    }
}
?>