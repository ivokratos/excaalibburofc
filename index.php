<?php
session_start();
include_once 'conexaobd.php';

// Verifique se o usuário está logado
$iduser = $_SESSION['idusuario'] ?? null;
$id_plano_atual = null; // Defina $id_plano_atual como null por padrão

// Se o usuário estiver logado, verifique se ele já tem um plano selecionado
if ($iduser) {
    $stmt = $conn->prepare("SELECT idplano FROM cadastro_planos WHERE idcadastro = ?");
    $stmt->bind_param("i", $iduser);
    $stmt->execute();
    $stmt->bind_result($id_plano_atual);
    $stmt->fetch();
    $stmt->close();                                                                             //só terminar os detalhes
}

// Lógica de seleção de plano para usuários logados e que ainda não têm um plano
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($iduser) {
        $novo_plano = intval($_POST['plano']);

        // Verifique se o novo plano é diferente do atual
        if ($novo_plano != $id_plano_atual) {
            $stmt = $conn->prepare("UPDATE cadastro_planos SET idplano = ? WHERE idcadastro = ?");
            $stmt->bind_param("ii", $novo_plano, $iduser);

            if ($stmt->execute()) {
                echo "<script>alert('Plano alterado com sucesso!'); window.location.href='paginainicial.php';</script>";
                exit();
            } else {
                echo "<script>alert('Erro ao alterar o plano.');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Você já está no plano selecionado. Escolha outro.');</script>";
        }
    } else {
        // Se não estiver logado, redireciona para a página de login
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Excalibbur</title>
    <link rel="stylesheet" href="plano.css" />
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
            <a href="login.php">Sair</a>
            <a href="suporte.php">Suporte</a>
        </nav>
        <div class="foto-perfil">
            <img src="foto1.png" alt="Foto de Perfil" />
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        <section class="planos">
            <form method="post" action="index.php">
                <div class="plano">
                    <h2>Gratuito</h2>
                    <p>
                        30GB de armazenamento na nuvem<br />Sem suporte especializado<br />Sem
                        ferramentas web <br />Contém anúncios
                    </p>
                    <button type="submit" name="plano" value="1"
                        <?php echo ($id_plano_atual == 1) ? 'disabled' : ''; ?>>
                        Gratuito
                    </button>
                </div>
                <div class="plano">
                    <h2>Básico</h2>
                    <p>
                        1TB de armazenamento na nuvem<br />Suporte das 9h às 15h (dias
                        úteis)<br />1 ano de backup
                    </p>
                    <button type="submit" name="plano" value="2"
                        <?php echo ($id_plano_atual == 2) ? 'disabled' : ''; ?>>
                        R$ 34,90/mês
                    </button>
                </div>
                <div class="plano">
                    <h2>Profissional</h2>
                    <p>
                        5TB de armazenamento na nuvem<br />Suporte 24 horas todos os dias<br />5
                        anos de backup<br />Ferramentas web inclusas
                    </p>
                    <button type="submit" name="plano" value="3"
                        <?php echo ($id_plano_atual == 3) ? 'disabled' : ''; ?>>
                        R$ 98,90/mês
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>