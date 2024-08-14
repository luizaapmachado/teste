<?php
session_start();
if (isset($_POST['submit'])) 
    include_once("config.php");


function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {

    $nome = sanitizeInput($_POST['name']);
    $cpf = sanitizeInput($_POST['cpf']);
    $telefone = sanitizeInput($_POST['telefone']);
    $email = sanitizeInput($_POST['email']);
    $nome_usuario = sanitizeInput($_POST['nome_usuario']);
    $senha = sanitizeInput($_POST['senha']);

    $cpf_check_query = "SELECT * FROM cadastro WHERE cpf = '$cpf' LIMIT 1";
    $cpf_check_result = mysqli_query($conexao, $cpf_check_query);
    if (mysqli_num_rows($cpf_check_result) > 0) {
        $error_message = 'CPF já cadastrado.';
    }
    
    $sql = "INSERT INTO cadastro (nome, cpf, telefone, email, nome_usuario, senha) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssssss', $nome, $cpf, $telefone, $email, $nome_usuario, $senha);

    if ($stmt->execute()) {
        echo "<p class='success'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar usuário: " . $conexao->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <script src="arquivo3.js" defer></script>
    <link rel="stylesheet" href="cadastro.css">
    <title>Coffee & Cats</title>
    
</head>
<body>
    <header>
        <div class="logo">
          <button class="image-button" onclick="window.location.href='home.html';">
            <img src="8aa3aa05-988a-418e-aadc-c7f4ae73d73d-removebg-preview.png" alt="Voltar à Página Inicial">
          </button>
            <h1 class="logo-text">Coffee & Cats</h1>
        </div>
        <nav>
            <a href="login.html">Login</a>
            <a href="cadastro.html">Cadastre-se</a>
            <ion-icon class="icon" name="cart-outline"></ion-icon>
        </nav>
    </header>

    <main>
        <nav class="main-nav">
            <a href="menu.html">Menu</a>
            <a href="sobrenos.html">Sobre Nós</a>
        </nav>
      <div class="login-container">
        <h2>Cadastro</h2>
        <div id="success-message" class="message"></div>
        <div id="error-message" class="error"><?php $error_message; ?></div>
        <form action="cadastro.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
    
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
    
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
    
            <label for="nome_usuario">Nome de Usuário:</label>
            <input type="text" id="nome_usuario" name="nome_usuario" required>
    
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
    
            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>
   
    <footer>
        <p>&copy; 2023 Coffee & Cats</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>

