<h1>ultimas noticias</h1>

<?php
  //sql buscar as 5 ultimas noticias
  $sql= "select id, titulo, date_format(data, '%d/%m/%Y') data from noticia order by data desc limit 5";

  //execultar o sql
  $consulta = mysqli_query($con, $sql);

  //separar os dados
  while( $dados = mysqli_fetch_array($consulta)){
    $id = $dados["id"];
    $titulo = $dados["titulo"];
    $data = $dados["data"];

    echo "
  
  <h2>{$titulo}</h2>
  <p>postado em: {$data}</p>
  <p>
    <a href='index.php?pagina=noticia&id={$id}'>
    ler noticia
    </a>
  </p>
  <hr>
  ";


  }

  

?>