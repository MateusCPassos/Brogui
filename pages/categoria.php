<?php
  $id = $_GET["id"] ?? NULL;
  //transformar o id em inteiro 
  $id = (int)$id;

  if(empty ($id)){
    echo "<p>categoria nao encontrada</p>";

  }else{
    $sql = "select * from categoria where id={$id}";

    $consultar = mysqli_query( $con, $sql);

    $dados = mysqli_fetch_array ($consultar);

    //vereficar se a categoria existe
    if( empty( $dados["categoria"])){
      echo "<p>Categoria inexistente</p>";
    }else{

    

    $categoria = $dados["categoria"];

    echo "<h1>Noticias da categoria {$categoria}</h1>";

      //mostar as noticias desta categoria 
     
      $sql = "select *, date_format(data, '%d/%m/%Y') data from noticia where categoria_id = {$id} order by data desc";

      //execultar o sql
      $consulta = mysqli_query( $con, $sql);

      //separar os dados

      while( $dados = mysqli_fetch_array( $consulta)){
        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $data = $dados["data"];

        //mostar na tela
        echo "<h2>{$titulo}</h2>
        <p>data da postagem: {$data}</p>
        <p>
          <a href='index.php?pagina=noticia&id={$id}'>
          ler mais
          </a>;
          </p>
          <hr>";

      }

    }
  }



?>