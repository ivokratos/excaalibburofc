<?php
session_start();
require_once 'conexaobd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT  iduser, senha FROM  cadastro WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['idusuario'] = $user['iduser'];
        header('location:index.php');
    } else {
        echo "email ou senha incorretos.";
    }
}
