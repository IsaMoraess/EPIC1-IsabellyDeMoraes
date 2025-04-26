<?php
require 'conexao.php';

$manutencoes = $pdo->query("
    SELECT m.id, v.modelo, v.placa, m.tipo, m.dados, m.km, m.custo
    FROM manutencoes m
    JOIN veiculos v ON m.veiculo_id = v.id
    ORDER BY m.id DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenções Registradas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="containerl">
        <h1>Manutenções Registradas</h1>

        <?php if (count($manutencoes) > 0): ?>
            <table class="tabela-manutencao">
                <thead>
                    <tr>
                        <th>Veículo</th>
                        <th>Placa</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Quilometragem</th>
                        <th>Custo (R$)</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($manutencoes as $manutencao): ?>
                        <tr>
                            <td><?= htmlspecialchars($manutencao['modelo']) ?></td>
                            <td><?= htmlspecialchars($manutencao['placa']) ?></td>
                            <td><?= htmlspecialchars($manutencao['tipo']) ?></td>
                            <td><?= htmlspecialchars($manutencao['dados']) ?></td>
                            <td><?= htmlspecialchars($manutencao['km']) ?></td>
                            <td><?= number_format($manutencao['custo'], 2, ',', '.') ?></td>
                            <td>
                                <a href="editar.php?id=<?= $manutencao['id'] ?>" class="btn-editar">✏️</a>
                                <a href="excluir_manutencao.php?id=<?= $manutencao['id'] ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir?')">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem-vazia">Nenhuma manutenção registrada.</p>
        <?php endif; ?>

        <a href="dashboard.php" class="btn-voltar">Voltar ao Dashboard</a>
    </div>
</body>
</html>
