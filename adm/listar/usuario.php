<h1 class="center">Listar usuario</h1>
<table>
  <thead>
    <tr>
      <td width="5%">
        ID
      </td>
      <td width="25%">
        nome
      </td>
      <td width="25%">
        email
      </td>
      <td width="25%">
        login
      </td>
      <td width="15%">
        opções
      </td>
    </tr>
</thead>
</tbody>

<?php
    //selecionar os usuarios
    $sql = "SELECT * FROM usuario ORDER BY id";
    //execultar o sql
    $consulta = mysqli_query($con, $sql);
     //laço de repetição para retirar os resultados
     while( $dados = mysqli_fetch_array($consulta)){
      $id = $dados["id"];
      $nome = $dados["nome"];
      $email = $dados["email"];
      $login = $dados["login"];
      ?>

      <tr>
        <td><?=$id?></td>
        <td><?=$nome?></td>
        <td><?=$email?></td>
        <td><?=$login?></td>
        <td>
          <a href="index.php?acao=cadastrar&tabela=usuario&id=<?=$id?>">editar</a>

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
        location.href="index.php?acao=excluir&tabela=usuario&id=" + id;
      }
    }
    </script>