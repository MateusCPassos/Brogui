<h1 class="center">Listar categoria</h1>
<table>
    <thead>
      <tr>
        <td width="10%">
          ID
        </td>
        <td width="60%">
          categoria
        </td>
        <td width="30%">
          opções
        </td>
      </tr>
    </thead>
    <tbody>
        <?php
          //SELECIONAR AS CATEGORIAS 
          $sql = "SELECT * FROM categoria ORDER BY categoria";
          //execultar o sql
          $consulta = mysqli_query( $con, $sql);
          //laço de repetição para retirar os resultados
          while( $dados = mysqli_fetch_array($consulta)){
            $id = $dados["id"];
            $categoria = $dados["categoria"];
            ?>
            <tr>
              <td><?=$id?></td>
              <td><?=$categoria?></td>
              <td>
                  <a href="index.php?acao=cadastrar&tabela=categoria&id=<?=$id?>">editar</a>

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
//função em java script para perguntar se quero excluir
function excluir( id ){
if(confirm ("desaja excluir este registro? ")){
  //chamar a tela excluir e passar o id
  location.href="index.php?acao=excluir&tabela=categoria&id=" + id;
}
}
</script>