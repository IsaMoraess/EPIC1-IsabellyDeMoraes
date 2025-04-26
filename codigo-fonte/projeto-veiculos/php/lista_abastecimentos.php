<?php
require 'conexao.php';

$abastecimentos = $pdo->query("
    SELECT a.id, v.modelo, v.placa, a.dados, a.litros, a.custo_total, a.km_atual
    FROM abastecimentos a
    JOIN veiculos v ON a.veiculo_id = v.id
    ORDER BY a.id DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Abastecimentos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-color: #f2f6fc;">
    <div class="container-tabela">
        <h1>Histórico de Abastecimentos</h1>

        <table class="tabela-abastecimento">
            <thead>
                <tr>
                    <th>Veículo</th>
                    <th>Placa</th>
                    <th>Dados</th>
                    <th>Litros</th>
                    <th>Custo Total (R$)</th>
                    <th>Quilometragem Atual</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($abastecimentos as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['modelo']) ?></td>
                        <td><?= htmlspecialchars($item['placa']) ?></td>
                        <td><?= nl2br(htmlspecialchars($item['dados'])) ?></td>
                        <td><?= number_format($item['litros'], 2, ',', '.') ?> L</td>
                        <td>R$ <?= number_format($item['custo_total'], 2, ',', '.') ?></td>
                        <td><?= (int)$item['km_atual'] ?> km</td>
                        <td>
                            <a href="excluir_abastecimento.php?id=<?= $item['id'] ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este registro?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="dashboard.php" class="btn-voltar">Voltar</a>
    </div>
</body>
</html>
