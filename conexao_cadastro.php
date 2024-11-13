<?php
require_once 'conexaobd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['data'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    //meu

    // Verifica se o username já está cadastrado
    $sql = "SELECT * FROM cadastro WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('O nome de usuário já está cadastrado. Tente com outro nome.'); window.location.href='cadastro.php';</script>";
    } else {
        // Verifica se o email já está cadastrado
        $sql = "SELECT * FROM cadastro WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('O email já está cadastrado. Tente com outro email.'); window.location.href='login.php';</script>";
        } else {
            // Verifica se o telefone já está cadastrado
            $sql = "SELECT * FROM cadastro WHERE telefones = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $telefone);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "<script>alert('O telefone já está cadastrado. Tente com outro número.'); window.location.href='cadastro.php';</script>";
            } else {
                // Se nenhum campo já está cadastrado, insere os dados
                $sql = "INSERT INTO cadastro (username, email, cpf, telefones, nascimentodata, senha) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $username, $email, $cpf, $telefone, $nascimento, $senha);

                //mensagens
                if ($stmt->execute()) {
                    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Ocorreu um erro ao tentar cadastrar. Tente novamente.'); window.location.href='cadastro.php';</script>";
                }
            }
        }
    }
}
