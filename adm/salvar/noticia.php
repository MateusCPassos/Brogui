<?php
  $id= trim ($_POST["id"] ?? NULL);
  $titulo = trim ($_POST["titulo"] ?? NULL);
  $texto = trim ($_POST["texto"] ?? NULL);
  $data = trim( $_POST["data"] ?? NULL);
  $categoria_id= trim( $_POST["categoria_id"] ?? NULL);

  if(empty($titulo)){
    mensagem("prencha o titulo");
  }else if(empty($texto)){
    mensagem("prencha o texto da noticia");
  }else if(empty($data)){
    mensagem("prencha a data");
  }else if(empty($categoria_id)){
    mensagem("selecione uma categoria");
  }

  //gravar no banco
  //gravar ou atualizar
  if(empty($id)){
    //gravar os dados no banco insert 
    $sql = "INSERT INTO noticia VALUES (NULL, '{$titulo}', '{$texto}','{$data}','{$categoria_id}')";
  }else{
    //atualizar os dados no banco de dados - update
    $sql= "UPDATE  noticia SET titulo = '{$titulo}', texto = '{$texto}', data='{$data}', categoria_id = '{$categoria_id}' WHERE id= '{$id}' LIMIT 1";
  }

  //execultar o sql

  if(mysqli_query($con, $sql)){
    mensagem("registro salvo com sucesso");
  }else{
    mensagem("erro ao salvar registro");
  }