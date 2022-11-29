<h1 class="center">cadastro de categoria</h1>
<P class="center">
    <a href="index.php?acao=cadastrar&tabela=categoria" class="btn">
      Novo cadastro
</a>

<a href="index.php?acao=listar&tabela=categoria" class="btn">
  listar cadastros
</a>
</P>
<hr>
<?php
  //recuperar o id
  $id = $_GET["id"] ??  NULL;
  $categoria = NULL;
  //verefeficar se existe id sendo enviado

  if( !empty($id)){
    $id = (int)$id;
    //echo "o id é: ": {$id}

    //sql para trazer os dados do id
    $sql = "SELECT * FROM categoria WHERE id= {$id}";
    //execultar o sql
    $consulta = mysqli_query( $con, $sql);
    //separar os dados
    $dados = mysqli_fetch_array( $consulta );

    $id = $dados["id"] ?? NULL;
    $categoria = $dados["categoria"] ?? NULL;
  }

?>
<form name="formCadastro" method="post"
action ="index.php?acao=salvar&tabela=categoria">
  <label for="id">ID</label>
  <input type="text" name="id" id="id" class="campo" readonly value="<?=$id?>">
  <label for="categoria">digite a categoria</label>
  <input type="text" name="categoria" id="categoria" class="campo" required value="<?=$categoria?>">
  <br>
  <button type="submit">gravar dados</button>
</form>