<?php
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM `cadastro` WHERE email = '$email' and senha = '$senha'";
        $result = $conexao->query($sql);

      

        if(mysqli_num_rows($result) >= 1)
        {

        }
        else{
          header('Location: login.html');
        }
    }
    else
    {
        // Não acessa
        header('Location: login.html');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <script src="arquivo3.js" defer></script>
    <link rel="stylesheet" href="carrinho.css">
    <title>Coffee & Cats</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
          <button class="image-button" onclick="window.location.href='home.html';">
            <img src="8aa3aa05-988a-418e-aadc-c7f4ae73d73d-removebg-preview.png" alt="Voltar à Página Inicial">
        </button>
            <h1>Coffee & Cats</h1>
        </div>
        <nav>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastro</a>
            <ion-icon class="icon" name="cart-outline"></ion-icon>
        </nav>
    </header>
    <main>
        <div class="page-title">Seu Carrinho</div>
        <div class="content">
          <section>
            <table>
              <thead>
                <tr>
                  <th>Produto</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th>Total</th>
                  <th>-</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="product">
                      <img src="https://picsum.photos/100/120" alt="" />
                      <div class="info">
                        <div class="name">Café gelado</div>
                      </div>
                    </div>
                  </td>
                  <td>R$ 12,99</td>
                  <td>
                    <div class="qty">
                      <button><i class="bx bx-minus"></i></button>
                      <span>2</span>
                      <button><i class="bx bx-plus"></i></button>
                    </div>
                  </td>
                  <td>R$ 15,99</td>
                  <td>
                    <button class="remove"><i class="bx bx-x"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="product">
                      <img src="https://picsum.photos/100/120" alt="" />
                      <div class="info">
                        <div class="name">Espresso</div>
                      </div>
                    </div>
                  </td>
                  <td>R$ 9,99</td>
                  <td>
                    <div class="qty">
                      <button><i class="bx bx-minus"></i></button>
                      <span>2</span>
                      <button><i class="bx bx-plus"></i></button>
                    </div>
                  </td>
                  <td>R$ 9,99</td>
                  <td>
                    <button class="remove"><i class="bx bx-x"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="product">
                      <img src="https://picsum.photos/100/120" alt="" />
                      <div class="info">
                        <div class="name">Biscoito de gatinho</div>
                      </div>
                    </div>
                  </td>
                  <td>R$ 8,99</td>
                  <td>
                    <div class="qty">
                      <button><i class="bx bx-minus"></i></button>
                      <span>2</span>
                      <button><i class="bx bx-plus"></i></button>
                    </div>
                  </td>
                  <td>R$ </td>
                  <td>
                    <button class="remove"><i class="bx bx-x"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </section>
          <aside>
            <div class="box">
              <header>Resumo da compra</header>
              <div class="info">
                <div><span>Sub-total</span><span>R$ 418</span></div>
                <div><span>Frete</span><span>Gratuito</span></div>
                <div>
                  <button>
                    Adicionar cupom de desconto
                    <i class="bx bx-right-arrow-alt"></i>
                  </button>
                </div>
              </div>
              <footer>
                <span>Total</span>
                <span>R$ 418</span>
              </footer>
            </div>
            <button>Finalizar Compra</button>
          </aside>
        </div>
      </main>
      <footer>
        <p>&copy; 2023 Coffee & Cats</p>
    </footer>
    </body>
  </html>