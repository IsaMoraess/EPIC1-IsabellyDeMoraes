<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $veiculo_id = $_POST['veiculo_id'];
    $dados = $_POST['dados'];
    $litros = $_POST['litros'];
    $custo_total = $_POST['custo_total'];
    $km_atual = $_POST['km_atual'];

    $stmt = $pdo->prepare("INSERT INTO abastecimentos (veiculo_id, dados, litros, custo_total, km_atual) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$veiculo_id, $dados, $litros, $custo_total, $km_atual]);

    $mensagem = "Abastecimento registrado com sucesso!";
}

$veiculos = $pdo->query("SELECT * FROM veiculos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Abastecimento</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <main class="containerab">
        <h1>Registrar Abastecimento</h1>

        <?php if (!empty($mensagem)): ?>
            <p class="success-msg"><?= $mensagem ?></p>
        <?php endif; ?>

        <form method="POST" class="form-abastecimento" autocomplete="off">
            <div>
                <label for="veiculo_id">Veículo:</label>
                <select name="veiculo_id" id="veiculo_id" required>
                    <option value="" disabled selected>Selecione um veículo</option>
                    <?php foreach ($veiculos as $veiculo): ?>
                        <option value="<?= $veiculo['id'] ?>">
                            <?= htmlspecialchars($veiculo['modelo']) ?> (<?= htmlspecialchars($veiculo['placa']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="dados">Dados:</label>
                <textarea name="dados" id="dados" placeholder="Ex: Posto BR - Etanol" required></textarea>
            </div>

            <div>
                <label for="litros">Litros abastecidos:</label>
                <input type="number" step="0.01" name="litros" id="litros" placeholder="Ex: 30.5" required>
            </div>

            <div>
                <label for="custo_total">Custo total (R$):</label>
                <input type="number" step="0.01" name="custo_total" id="custo_total" placeholder="Ex: 200.00" required>
            </div>

            <div>
                <label for="km_atual">Quilometragem Atual:</label>
                <input type="number" name="km_atual" id="km_atual" placeholder="Ex: 45000" required>
            </div>

            <button type="submit" class="btn-salvar">Salvar</button>
        </form>

        <a href="dashboard.php" class="btn-voltar">Voltar</a>
    </main>

</body>
</html>
