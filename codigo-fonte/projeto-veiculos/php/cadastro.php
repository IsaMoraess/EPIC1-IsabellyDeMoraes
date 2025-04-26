<?php
require 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["senha"])) {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
        header("Location: formulario_cadastro.php");
        exit;
    }

    $nome = trim($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $senha = $_POST["senha"];

    if (!$email) {
        $_SESSION['mensagem'] = "E-mail inválido!";
        header("Location: formulario_cadastro.php");
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        $_SESSION['mensagem'] = "Este e-mail já está cadastrado!";
        header("Location: ../cadastro.php");
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha_hash]);

        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . $e->getMessage();
    }

    header("Location: ../cadastro.php");
    exit;
}
?>