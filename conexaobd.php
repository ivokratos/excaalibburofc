<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "excalibburcc";

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$conn = new mysqli('localhost', 'root', '', 'excalibburcc');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
