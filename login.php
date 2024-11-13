<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="loginn.css" />
  <title>Excalibbur</title>
</head>

<body>
  <header>
    <nav>
      <div class="cabecalho">
        <div class="links">
          <a href="sobre.php">Sobre</a>
          <a href="cadastro.php">Inscreva-se</a>
          <a href="suportesemlogin.php">Suporte</a>
        </div>
        <div class="div-perfil">
          <img src="foto1.png" id="perf" alt="foto1" />
        </div>
      </div>
    </nav>
  </header>
  <div class="posicionar-form">
    <div class="div-formulario">
      <h2>Login</h2>
      <br />

      <div class="posicionar-espada">
        <div class="div-espada">
          <img src="logo.svg" alt="logodosite" id="espada" />
        </div>
      </div>
      <form action="conexao_login.php" method="POST">
        <label for="email">Email</label><br />
        <input
          type="email"
          placeholder="ex:amominhaex13@gmail.com"
          name="email"
          required /><br /><br /><br />

        <label for="senha">Senha</label><br />
        <input
          type="password"
          placeholder="ex:131022"
          name="senha"
          required /><br />
        <button type="submit" id="enviar">Entrar</button>
        <br />
        <div class="esquece">
          <a href="esqueci.html" id="esqueci">Esqueci minha senha</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>