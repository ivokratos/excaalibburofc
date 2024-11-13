<?php
session_start();
include_once 'conexaobd.php';

// Inicialize variáveis
$nome_plano = "";
$preco = "";
$ferramentas_web = "";
$backup = "";
$armazenamento = "";
$suporte = "";
$anuncio = "";

// Obtendo o ID do usuário da sessão
$iduser = $_SESSION['idusuario'] ?? null; // Certifique-se de que o ID do usuário está na sessão

// Verifica se o usuário já possui um plano selecionado
if ($iduser) {
    $stmt = $conn->prepare("SELECT tp.nome_plano, tp.preco, tp.ferramentas_web, tp.backupi, tp.armazenamento, tp.suporte, tp.anuncio 
                            FROM cadastro_planos cp
                            JOIN tipos_planos tp ON cp.idplano = tp.idplano
                            WHERE cp.idcadastro = ?");
    $stmt->bind_param("i", $iduser);
    $stmt->execute();
    $stmt->bind_result($nome_plano, $preco, $ferramentas_web, $backup, $armazenamento, $suporte, $anuncio);

    if (!$stmt->fetch()) {
        // Nenhum plano encontrado
        $nome_plano = null; // Indica que o usuário ainda não tem um plano
    }
    $stmt->close();
} else {
    // Se o usuário não está logado, redirecione para a página de login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Excalibbur</title>
    <link rel="stylesheet" href="inicial.css" />
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <div class="logo">
            <img src="logo.svg" alt="Logo Excalibbur" />
            <h1>Excalibbur</h1>
        </div>
        <nav>
            <a href="inicial.php">Home</a>
            <a href="index.php">Trocar Plano</a>
            <a href="sair.php">Sair</a>
            <a href="suporte.php">Suporte</a>
        </nav>
        <div class="foto-perfil">
            <img src="foto1.png" alt="Foto de Perfil" />
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        <section class="consulta-plano">
            <h2>Consulta do Plano</h2>

            <!-- Exibição dos dados do plano -->
            <?php if ($nome_plano): ?>
                <div class="detalhes-plano">
                    <h3>Plano Atual: <?php echo htmlspecialchars($nome_plano); ?></h3>
                    <p>Preço: <?php echo nl2br(htmlspecialchars($preco)); ?></p>
                    <p>Ferramentas Web: <?php echo $ferramentas_web ? 'Sim' : 'Não'; ?></p>
                    <p>Backup: <?php echo nl2br(htmlspecialchars($backup)); ?></p>
                    <p>Armazenamento: <?php echo nl2br(htmlspecialchars($armazenamento)); ?></p>
                    <p>Suporte: <?php echo nl2br(htmlspecialchars($suporte)); ?></p>
                    <p>Anúncio: <?php echo $anuncio ? 'Sim' : 'Não'; ?></p>
                </div>
            <?php else: ?>
                <p>Você ainda não possui um plano selecionado.</p>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>