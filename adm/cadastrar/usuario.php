<h1 class="center">cadastro de usuario</h1>
<p class="center">
    <a href="index.php?acao=cadastrar&tabela=usuario" class="btn">
      novo cadastro
    </a>
    <a href="index.php?acao=listar&tabela=usuario" class="btn">
      listar cadastro
    </a>
</p>
<hr>
<?php
    //vereficar se esta sendo enviado um id
    if( isset ($_GET["id"])){
      //recuperar o id e transferir em inteiro
      $id = (int)$_GET["id"];
      //sql para buscar o usuario
      $sqlUsuario = "select * from usuario where id = {$id}";
      //execultar o sql
      $consulta = mysqli_query($con, $sqlUsuario);
      //separar os dados
      $dados = mysqli_fetch_array($consulta);
    }

    $id= $dados["id"] ?? NULL;
    $nome =$dados["nome"] ?? NULL;
    $login = $dados["login"] ?? NULL;
    $email = $dados["email"] ?? NULL;
?>

<form name="formCadastro" method="post" action="index.php?acao=salvar&tabela=usuario">
  <label for="id">ID</label>
  <input type="text" name="id" id="id" class="campo" value="<?=$id?>" readonly>

  <label for="nome">digite seu nome: </label>
  <input type="text" name="nome" id="nome" class="campo" value="<?=$nome?>" required>

  <label for="email">digite o seu email:</label>
  <input type="email" name="email" id="email" class="campo" value="<?=$email?>" required>

  <label for="login">digite seu login</label>
  <input type="text" name="login" id="login" class="campo" value="<?=$login?>" required>

  <label for="senha">digite a sua senha</label>
  <input type="password" name="senha" id="senha" class="campo">

  <label for="senha2">digite a sua senha</label>
  <input type="password" name="senha2" id="senha2" class="campo">

  <br>
  <button type="submit">gravar dados</button>