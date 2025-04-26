<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM abastecimentos WHERE id = ?");
    $stmt->execute([$id]);

    echo "Abastecimento excluído com sucesso!";
}
?>
<a href="lista_abastecimentos.php"><button>Voltar</button></a>
