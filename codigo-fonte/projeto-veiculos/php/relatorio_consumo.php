<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Relatório de Consumo</title>
</head>
<body>
<div class="relatorio">
    <h2>Relatório de Consumo Médio</h2>
    <table class="tabela-consumo">
        <thead>
            <tr>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Consumo Médio (km/L)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'conexao.php';

            $sql = "SELECT v.modelo, v.placa, 
                           SUM(a.km_atual) AS km_total, 
                           SUM(a.litros) AS litros_total
                    FROM veiculos v
                    LEFT JOIN abastecimentos a ON v.id = a.veiculo_id
                    GROUP BY v.id";

            $stmt = $pdo->query($sql);
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dados as $registro) {
                $modelo = htmlspecialchars($registro['modelo']);
                $placa = htmlspecialchars($registro['placa']);
                $km = (float) $registro['km_total'];
                $litros = (float) $registro['litros_total'];

                echo "<tr>";
                echo "<td>$modelo</td>";
                echo "<td>$placa</td>";
                echo "<td>";

                if ($litros > 0) {
                    $consumo = $km / $litros;
                    echo number_format($consumo, 2) . " km/L";
                } else {
                    echo "Dados insuficientes";
                }

                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn-voltar-relatorio">Voltar</a>
</div>
</body>
</html>
