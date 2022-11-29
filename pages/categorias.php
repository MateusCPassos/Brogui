<h1>categorias de noticias</h1>
<ul>
  <?php
  //SELECIONAR AS CATEGORIAS
  $sql="select * from categoria order by categoria";
  //execultar a consulta
  $consulta = mysqli_query( $con, $sql);

  //separar os resultados
  while( $dados = mysqli_fetch_array( $consulta)){
    $id = $dados["id"];
    $categorias = $dados["categoria"];

    echo "
    <li>
      <a href='index.php?pagina=categoria&id={$id}'>
      {$categorias}
    </a>
    </li>
    
    
    ";


  }

  ?>
</ul>