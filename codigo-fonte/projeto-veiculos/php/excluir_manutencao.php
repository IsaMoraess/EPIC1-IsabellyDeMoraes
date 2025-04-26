<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM manutencoes WHERE id = ?");
    $stmt->execute([$id]);

    echo "Manutenção excluída com sucesso!";
}
?>
<a href="lista_manutencoes.php"><button>Voltar</button></a>
