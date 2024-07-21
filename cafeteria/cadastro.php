<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafeteria";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário
    $nome = $_POST['name'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $nome_usuario = $_POST['username'];
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

    // Inserir dados no banco de dados
    $sql = "INSERT INTO cadastro (nome, cpf, telefone, email, nome_usuario, senha) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $cpf, $telefone, $email, $nome_usuario, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a declaração
    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>
