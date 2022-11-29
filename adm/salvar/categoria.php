<?php

//recupearar os dados digitados
$id = trim ($_POST["id"] ?? NULL);
$categoria = trim ($_POST["categoria"] ?? NULL);

//print_r( $_POST);

//vereficar se o campo esta prenchido
if( empty ($categoria)){
  mensagem("prencha a categoria");
}

//se o id esta vazio - se estiver vazio izernt - se nao update
if(empty ($id)){
  //insert do banco - pois o id esta vazio
  $sql = "INSERT INTO categoria VALUES (NULL, '{$categoria}')";

  //echo $sql;
}else {
  //update pois o id nao esta vazio
  $sql = "UPDATE categoria SET categoria = '{$categoria}' WHERE id = '{$id}'";
}


//execultar um dos sql para gravar ou atualizar
if( mysqli_query( $con, $sql)){
  mensagem("o registro foi salvo com sucesso");
}else{
  mensagem("erro ao salvar o registro");
}