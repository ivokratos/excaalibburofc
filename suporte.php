<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=, initial-scale=1.0" />
  <link rel="stylesheet" href="suportee.css" />
  <title>Excalibbur</title>
</head>

<body>
  <div class="titulo">
    <h1>Suporte</h1>
  </div>
  <div class="caixa">
    <form action="conexao_suporte.php" method="POST">
      <label for="tipo">Selecione o tipo do problema</label><br>
      <select id="tipo" name="tipo_problema" required>
        <div class="div-options">
          <option value="Dúvida">Dúvida</option>
          <option value="Sugestão">Sugestão</option>
          <option value="Erro">Erro</option>
          <option value="Outros">Outros</option>
        </div>
      </select><br> <br>
      <label for="digitar">Digite seu problema abaixo</label><br>
      <div class="div-digitar">
        <input id="digitar" name="reclamacao" type="text" placeholder="Digite aqui..." />
      </div>
      <button type="submit">Enviar</button>
    </form>
  </div>
  <div class="numero">
    <img src="sp.png" alt="" />
  </div>
</body>

</html>