<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h2>Cadastro</h2>

    <form action="php/cadastro.php" method="POST">
      <fieldset>
        <legend>Preencha seus dados</legend>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required placeholder="Digite seu nome" autocomplete="name">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required placeholder="Digite seu e-mail" autocomplete="email">

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required minlength="6" placeholder="Digite sua senha">

        <button type="submit">Cadastrar</button>
      </fieldset>
    </form>

    <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
  </div>
</body>

</html>