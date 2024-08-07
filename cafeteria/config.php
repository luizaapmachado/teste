<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafeteria";

// Conectar ao banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}