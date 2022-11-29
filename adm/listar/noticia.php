<h1 class="center">Listar noticias</h1>
<table>
  <thead>
    <tr>
      <td width="10%">
        ID
      </td>
      <td width="60%">
        noticia
      </td>
      <td width="30%">
        opções
      </td>
    </tr>
</thead>

</tbody>
  <?php
    //selecionar as noticias
    $sql = "SELECT * FROM noticia ORDER BY id";
    //execultar o sql
    $consulta = mysqli_query($con, $sql);
    //laço de repetição para retirar os resultados
    while( $dados = mysqli_fetch_array($consulta)){
      $id = $dados["id"];
      $noticia = $dados["titulo"];
      ?>
      <tr>
        <td><?=$id?></td>
        <td><?=$noticia?></td>
        <td>
          <a href="index.php?acao=cadastrar&tabela=noticia&id=<?=$id?>">editar</a>

          <a href="javascript:excluir(<?=$id?>)">
          excluir
          </a>
        </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<script>
  //excluir noticia
    function excluir( id ){
      if(confirm("deseja excluir esta noticia?")){
        //chamar a tela e excluir o id
        location.href="index.php?acao=excluir&tabela=noticia&id=" + id;
      }
    }
    </script>