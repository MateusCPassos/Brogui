<?php
    //iniciar a sessao
    session_start();
    //incluir arquivos do banco de dados
    include "../config.php";

    //recuperar os dados digitados mo formulario

    $login = trim ($_POST["login"] ?? NULL);
    $senha = trim ($_POST["senha"] ?? NULL);

    //TRIM - retira todos os espaço em branco

    //vereficar se os bancos estão prenchidos
    if(empty ($login)){
        mensagem("prencha o campo login");
    }else if(empty($senha)){
        mensagem("prencha o campo senha");
    }

    //vereficar se ele existe 
    $sql = "select * from usuario where login= '{$login}' ";
   // echo $sql;
   $consulta = mysqli_query( $con, $sql);
   $dados = mysqli_fetch_array( $consulta );


   //vereficar se o usurario existe
   $id = $dados["id"] ?? NULL;
   if( empty ( $id ) ){
    mensagem ("usuario ou senha invalidos");
   }else if( !password_verify( $senha, $dados["senha"])){
      mensagem("usuarios ou senhas invalidos");
   }

   //registar usuario e direcionar para a tela de menu

   $_SESSION["brogui"] = array("id" => $id,
                              "login" => $dados["login"]);

   echo "<script>location.href='index.php'</script>";