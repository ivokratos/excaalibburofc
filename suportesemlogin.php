<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="suporte_sem_login.css" />
  <title>Excalibbur</title>
</head>

<body>
  <div class="pos-h1">
    <h1>Suporte</h1>
  </div>
  <br />
  <br />

  <div class="posicionar-caixa">
    <div class="caixa-suporte">
      <form action="con_suportesemlogin.php" method="POST">
        <label for="nome">Nome</label><br />
        <input
          name="nome"
          id="nome"
          type="text"
          placeholder="Digite seu nome"
          required
          minlength="3" />
        <br />

        <label for="telefone">Telefone</label><br />
        <input
          name="telefone"
          id="telefone"
          type="tel"
          placeholder="ex:(11) 9999-99999"
          maxlength="15"
          required />
        <br />
        <label for="email">email</label><br />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Digite seu email"
          required
          maxlength="50" />
        <br />

        <label for="reclamacao">Ajuda</label> <br />
        <textarea name="reclamacao" id="reclamacao" maxlength="150"></textarea>
        <br />

        <input type="submit">
      </form>
    </div>
  </div>
</body>

</html>