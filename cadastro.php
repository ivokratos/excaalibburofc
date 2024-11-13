<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="stylee.css" />
  <title>Excalibbur</title>
</head>

<body>
  <div class="div-img">
    <img src="logo.svg" alt="" />
  </div>
  <div class="div-log">
    <div class="butão">
      <a href="login.php" id="butao-log">Já tem cadastro?</a>
    </div>
  </div>

  <div class="div-h1">
    <h1>Excalibbur</h1>
  </div>

  <div class="posicionar-cad">
    <div class="cadastro">
      <h2>Cadastro</h2>
      <br />
      <br />
      <form action="conexao_cadastro.php" method="POST">
        <div class="div-labels">
          <label for="username">Username</label> <br />
          <input
            type="text"
            name="username"
            id="username"
            placeholder="Máx:30 caracteres"
            maxlength="30"
            minlength="4"
            title="Digite seu nome de usuário"
            required /><br />
          <br />

          <label for="cpf">CPF</label><br />
          <input
            type="text"
            name="cpf"
            id="cpf"
            required
            maxlength="11"
            minlength="11"
            title="Digite seu CPF"
            placeholder="ex:23187688890" />
          <br />
          <br />

          <label for="email">Email</label> <br />
          <input
            type="email"
            name="email"
            id="email"
            placeholder="batata@exemplo.com"
            maxlength="50"
            required
            title="Digite seu email" /><br />
          <br />

          <label for="telefone">Telefone</label> <br />
          <input
            type="tel"
            name="telefone"
            id="telefone"
            placeholder="ex:11975659634"
            maxlength="11"
            minlength="11"
            title="Digite o telefone apenas com números"
            required>
          <br>
          <br />

          <label for="datas">Data de nascimento</label> <br />
          <input type="date" name="data" id="data" required /><br />
          <br />

          <label for="senhas">Senha</label> <br />
          <input
            type="password"
            name="senha"
            id="senha"
            placeholder="min:8 caracteres"
            minlength="8"
            required /><br />
          <br />
          <br />
        </div>

        <input type="submit" value="Cadastrar" id="cadastrar" required /> <br />
        <br />

        <p>
          Quer saber mais sobre nossa empresa?<a href="sobre.html" id="sobre">
            Clique aqui</a>
        </p>
      </form>
    </div>
  </div>


</body>

</html>