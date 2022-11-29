<?php

//recuperar o id
$id = $_GET["id"] ?? NULL;

//VEREFICAR SE O ID ESTA EM BRANCO
if( empty ($id)){
  mensagem("registro invalido");
}else{
  //transformar o id para inteiro
  $id = (int)$id;

  $sql = "SELECT  id FROM  usuario  WHERE id = {$id} LIMIT 1";
  $consulta = mysqli_query( $con, $sql);
  $dados = mysqli_fetch_array($consulta);

  //sql para excluir
  $sql = "DELETE FROM usuario WHERE id={$id} LIMIT 1";
  //execultar o sql
  if(mysqli_query( $con, $sql)){
    mensagem("usuario excluido");
  }else{
    mensagem("erro ao excluir usuario");
  }
}