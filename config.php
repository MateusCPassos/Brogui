<?php
    //criar conexão no banco de dados
    $servidor = "localhost";
    //usuario do banco
    $usuario = "root";
    //senha do banco
    $senha = "";
    //banco de dados a ser acessado
    $banco = "brogui";

    $con = mysqli_connect($servidor, $usuario, $senha, $banco)
    or die("nao foi possivel conectar no banco");

    //forçar em ficar utf8
    mysqli_set_charset($con, "utf8");

    //incluir uma função que retorne a tela anterior
    function mensagem($msg){
        echo "<script>alert('{$msg}'); history.back();</script>";
        exit;
    }
?>
