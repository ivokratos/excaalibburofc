<?php
session_start();
include_once 'conexaobd.php';

// Verifique se o usuário está logado
$iduser = $_SESSION['iduser'] ?? null;

if (!$iduser) {
    // Redireciona para a página de login se o usuário não estiver logado
    header("Location: login.php");
    exit();
}

// Inicialize variáveis para os dados do plano
$nome_plano = "";
$descricao_plano = "";

// Verifique se o usuário tem um plano selecionado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mostrar_plano'])) {
    $stmt = $conn->prepare("SELECT tp.nome, tp.descricao FROM cadastro_planos cp
                            JOIN tipos_planos tp ON cp.id_plano = tp.id_plano
                            WHERE cp.iduser = ?");
    $stmt->bind_param("i", $iduser);
    $stmt->execute();
    $stmt->bind_result($nome_plano, $descricao_plano);
    $stmt->fetch();
    $stmt->close();
}
