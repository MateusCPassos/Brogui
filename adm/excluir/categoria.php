<?php

//recuperar o id
$id = $_GET["id"] ?? NULL;

//VEREFICAR   se o id esta em branco
if( empty ( $id )){
  mensagem("registro invalido");
}else{
  //transformar o id para inteiro
  $id = (int)$id;

  $sql = "SELECT id FROM  noticia WHERE categoria_id = {$id} LIMIT 1";
  $consulta = mysqli_query( $con, $sql);
  $dados = mysqli_fetch_array($consulta);


  //vereficar se o id nao esta vazio
  if( !empty($dados["id"])){
    mensagem("voce não pode excluir este registro, pois existe notica cadastrada com ele");
  }
  //sql para excluir
  $sql = "DELETE FROM categoria WHERE id = {$id} LIMIT 1";
  //EXECULTAR O SQL
  if( mysqli_query( $con, $sql)){
    mensagem("registro excluido");
  }else{
    mensagem("erro ao excluir registro");
  }
}