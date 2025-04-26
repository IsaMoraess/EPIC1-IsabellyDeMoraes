<?php
require 'conexao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["senha"])) {
        $_SESSION["mensagem"] = "Preencha todos os campos!";
        header("Location: login.php");
        exit();
    }

    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $senha = trim($_POST["senha"]);

    if (!$email) {
        $_SESSION["mensagem"] = "E-mail inválido!";
        header("Location: login.php");
        exit();
    }

    $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario["senha"])) {
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION["mensagem"] = "Credenciais inválidas!";
        header("Location: login.php");
        exit();
    }
}

if (isset($_SESSION["mensagem"])) {
    $mensagem = $_SESSION["mensagem"];
    unset($_SESSION["mensagem"]);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<body>
  <?php if (!empty($mensagem)): ?>
  <p style="color: red;"><?= htmlspecialchars($mensagem) ?></p>
  <?php endif; ?>

  <form method="POST" action="login.php" autocomplete="off">
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
  </form>
</body>

</html>