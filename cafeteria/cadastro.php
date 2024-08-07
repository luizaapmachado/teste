<?php

    if(isset($_POST['submit']))
    {
    
        include_once('config.php');

        $nome = $_POST['name'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $nome_usuario = $_POST['nome_usuario'];
        $senha = $_POST['senha'];
      

        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome, cpf, telefone, email, nome_usuario, senha) 
        VALUES ('$nome','$cpf','$telefone','$email','$nome_usuario','$senha')");

        header('Location: cadastro.html');
    }

?>