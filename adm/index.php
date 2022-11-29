<?php
    //iniciar a sessao
    session_start();
    //conectar com o banco de dados
    include "../config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin do sistema</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //vereficar se esta logado
        if( !isset($_SESSION["brogui"])){
        //tela de login
        include "login.php";
        }else{
          //login do usuario registado
          $login = $_SESSION["brogui"]["login"];
          ?>

          <header>
            <a href="index.php" class="logo">
              ADIMINISTRADOR
            </a>

          <nav>
              <ul>
                <li>
                  <a href="index.php?acao=cadastrar&tabela=categoria">categoria</a>
                </li>
                <li>
                  <a href="index.php?acao=cadastrar&tabela=noticia">noticia</a>
                </li>
                <li>
                  <a href="index.php?acao=cadastrar&tabela=usuario">usuario</a>
                </li>
                <li>
                  <a href="sair.php">
                      Olá <?=$login?>, sair.
                  </a>
              </ul>
          </header>
          <main>
            <?php
              //recupear a acao e a tabela
              $acao = $_GET["acao"] ?? "paginas";
              $tabela = $_GET["tabela"] ?? "home";

              // acao = cadastrar e tabela = categoria
              // cadastar/categoria.php

              $arquivo = "{$acao}/{$tabela}.php";

              //echo $arquivo
              //vereficar se o arquivo existe
              if(file_exists( $arquivo )){
                include $arquivo;
              }else{
                include "paginas/erro.php";
              }
            ?>

          </main>
          <footer>
            <p class="center">
              desenvolvido por Mateus Cardoso Passos
            </P>
          </footer>


        <?php
        }
    ?>
</body>
</html>