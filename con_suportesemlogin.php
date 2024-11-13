<?php
include_once 'conexaobd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $reclamacao = $_POST['reclamacao'];

    $sql = "INSERT INTO suporte_login (nome, telefone, email, reclamacao)
    values (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $telefone, $email, $reclamacao);

    if ($stmt->execute()) { //terminar esse suporte e depois partir para back-end de planos//
        echo "<script>alert('Suporte encaminhado com sucesso!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Ocorreu algum erro ao enviar, tente novamente mais tarde'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}
$conn->close();
