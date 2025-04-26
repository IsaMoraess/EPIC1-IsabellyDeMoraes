<?php
require 'conexao.php';


$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $veiculo_id = $_POST['veiculo_id'];
    $tipo = trim($_POST['tipo']);
    $dados = trim($_POST['dados']);
    $km = $_POST['km'];
    $custo = $_POST['custo'];

    // Verificação simples
    if (!empty($veiculo_id) && !empty($tipo) && !empty($dados) && is_numeric($km) && is_numeric($custo)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO manutencoes (veiculo_id, tipo, dados, km, custo) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$veiculo_id, $tipo, $dados, $km, $custo]);
            $mensagem = "<div class='message success'>Manutenção adicionada com sucesso!</div>";
        } catch (PDOException $e) {
            $mensagem = "<div class='message error'>Erro ao adicionar manutenção: " . $e->getMessage() . "</div>";
        }
    } else {
        $mensagem = "<div class='message error'>Preencha todos os campos corretamente.</div>";
    }
}

$veiculos = $pdo->query("SELECT * FROM veiculos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Adicionar Manutenção</title>
</head>

<body>
  <div class="containerm">
    <h1>Adicionar Manutenção</h1>

    <?= $mensagem ?>

    <form method="POST" class="form-manutencao">
      <label for="veiculo_id">Veículo:</label>
      <select name="veiculo_id" required>
        <option value="">Selecione um veículo</option>
        <?php foreach ($veiculos as $veiculo): ?>
        <option value="<?= htmlspecialchars($veiculo['id']) ?>">
          <?= htmlspecialchars($veiculo['modelo']) ?> (<?= htmlspecialchars($veiculo['placa']) ?>)
        </option>
        <?php endforeach; ?>
      </select><br>

      <label for="tipo">Tipo de Manutenção:</label>
      <select name="tipo" required>
        <option value="">Selecione</option>
        <option value="Troca de óleo">Troca de óleo</option>
        <option value="Revisão">Revisão</option>
        <option value="Freios">Freios</option>
        <option value="Pneus">Pneus</option>
        <option value="alinhamento">Alinhamento e Balanceamento</option>
        <option value="Troca da Bateria">Troca da Bateria</option>
        <option value="Outros">Outros</option>
      </select><br>

      <label for="dados">Descrição:</label>
      <textarea name="dados" required></textarea><br>

      <label for="km">Quilometragem:</label>
      <input type="number" name="km" min="0" required><br>

      <label for="custo">Custo (R$):</label>
      <input type="number" name="custo" step="0.01" min="0" required><br>

      <button type="submit" class="btn-submit">Salvar Manutenção</button>
    </form>

    <a href="dashboard.php" class="btn-back">Voltar ao Dashboard</a>
  </div>
</body>

</html>