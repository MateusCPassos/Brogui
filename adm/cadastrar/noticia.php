<h1 class="center">cadastro de noticia</h1>
<p class="center">
    <a href="index.php?acao=cadastrar&tabela=noticia" class="btn">
      novo cadastro
    </a>
    <a href="index.php?acao=listar&tabela=noticia" class="btn">
      listar cadastro
    </a>
</p>
<hr>
  <?php
    //vereficar se existe id sendo enviado;
    if(isset ($_GET["id"])){
      //recuperar variavel
      $id = (int)$_GET["id"];
      //selecionar o registro do banco
      $sqlNoticia = "select * from noticia where id = {$id}";
      //execultar o sql
      $consulta = mysqli_query($con, $sqlNoticia);
      $dados = mysqli_fetch_array($consulta);
    }

    $id = $dados["id"] ?? NULL;
    $titulo = $dados["titulo"] ?? NULL;
    $texto = $dados["texto"] ?? NULL;
    $data = $dados["data"] ?? NULL;
    $categoria_id = $dados["categoria_id"] ?? NULL;

  ?>
<form name="formCadastro" method="post" action="index.php?acao=salvar&tabela=noticia">
  <label for="id">id</label>
  <input type="text" readonly name="id" id="id" class="campo" value="<?=$id?>">
  <label for="titulo">Titulo da noticia</label>
  <input type="text" name="titulo" id="titulo" class="campo" required value="<?=$titulo?>">
  <label for="texto">texto da noticia</label>
  <textarea name="texto" id="texto" required rows="6" class="campo"><?=$texto?></textarea>

  <label for="data">data de publicação</label>
  <input type="date" name="data" id="data" required class="campo" value="<?=$data?>">

  <label for="categoria_id">selecione uma categoria</label>
  <select name="categoria_id" id="categoria_id" required class="campo">
    <option value=""></option>
    <?php
      //selecionar todas as categorias
      $sql = "select * from categoria order by categoria";
      //execultar o sql
      $consulta = mysqli_query($con, $sql);

      while( $dados = mysqli_fetch_array($consulta)){
        $id = $dados["id"];
        $categoria = $dados["categoria"];

        echo "<option value='{$id}'>{$categoria}</option>";

      }
    ?>
    </select>
    <br>
    <button type="submit">gravar dados</button>

</form>

<script>
  document.querySelector("#categoria_id").value = "<?=$categoria_id?>";
  </script>