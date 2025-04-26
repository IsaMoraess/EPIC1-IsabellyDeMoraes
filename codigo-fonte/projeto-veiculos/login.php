<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="form-containercds">
        <h2 class="mb-4">Login</h2>
        <form action="php/login.php" method="POST">
            <input type="email" id="email" name="email" class="form-input" placeholder="E-mail" required>
            <input type="password" id="senha" name="senha" class="form-input" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <p class="mt-3">Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
    </div>

</body>
</html>
