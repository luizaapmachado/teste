<?php
$success = false;
$error_message = '';
if (isset($_POST['submit'])) {
    include_once('config.php');
    $nome_produto = $_POST['name'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $result = mysqli_query($conexao, "INSERT INTO produtos (nome_produto, descricao, preco) 
     VALUES ('$nome_produto', '$descricao', '$preco')");
    if ($result) {
        $success = true;
    } else {
        $error_message = "Erro ao cadastrar o produto: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <script src="arquivo3.js" defer></script>
    <link rel="stylesheet" href="cadastro.css">
    <title>Coffee & Cats</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
            <a href="cadastro.html">Cadastro</a>
            <ion-icon class="icon" name="cart-outline"></ion-icon>
        </nav>
    </header>

    <main>
        <nav class="main-nav">
            <a href="menu.html">Menu</a>
            <a href="sobrenos.html">Sobre Nós</a>
        </nav>

        <div class="login-container">
        <h2>Cadastro de Produto</h2>
        <div id="success-message" class="message"></div>
        <div id="error-message" class="error"><?php echo $error_message; ?></div>
        <form action="cadastroprod.php" method="POST">
            <label for="name">Nome do Produto:</label>
            <input type="text" id="name" name="name" required>
    
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
    
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>
    
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