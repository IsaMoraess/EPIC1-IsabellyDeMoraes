<?php
require 'conexao.php';
session_start();

if (isset($_GET['id'])) {
    $veiculo_id = $_GET['id'];
    echo "<h2>ID do veículo: $veiculo_id</h2>";

    $stmt = $pdo->prepare("SELECT * FROM manutencoes WHERE veiculo_id = ?");
    $stmt->execute([$veiculo_id]);
    $manutencoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($manutencoes) {
        echo "<h3>Manutenções Registradas:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Tipo</th><th>Dados</th><th>KM</th><th>Custo</th></tr>";

        foreach ($manutencoes as $manutencao) {
            echo "<tr>";
            echo "<td>" . $manutencao['id'] . "</td>";
            echo "<td>" . $manutencao['tipo'] . "</td>";
            echo "<td>" . $manutencao['dados'] . "</td>";
            echo "<td>" . $manutencao['km'] . "</td>";
            echo "<td>R$ " . number_format($manutencao['custo'], 2, ',', '.') . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhuma manutenção encontrada para este veículo.</p>";
    }
} else {
    echo "<p>ID do veículo não encontrado!</p>";
}
?>