<?php

session_start();

include_once 'conexaobd.php';


//ver se o usuario está logado, se não estiver ele redireciona para a página de login
if (!isset($_SESSION['idusuario'])) {
    header("location:login.php");
    exit();
}



//recolhe oos dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iduser = $_SESSION['idusuario'];
    $reclamacao = $_POST['reclamacao'];
    $tipo_problema = $_POST['tipo_problema'];

    $sql = "INSERT INTO  suporte (idcadastro, tipo_de_problema, reclamacao, datasuporte)
    values (?, ?, ?, NOW())";

    //inserção com proteção rs rs rs 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $iduser, $tipo_problema, $reclamacao);

    if ($stmt->execute()) {
        echo "<script>alert('Suporte foi encamiinhado com sucesso!'); window.location.href='paginainicial.php';</script>";
    }

    //Se ocorrer um erro aparece essa mensagem
    else {
        echo "<script>alert('Ocorreu algum erro.Tente novamente mais tarde.'); window.location.href='paginainicial.php';</script>";
    }



    $stmt->close();
}

$conn->close();
