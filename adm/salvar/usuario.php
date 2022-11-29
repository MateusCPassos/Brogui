<?php
//recuperar os dados do formulario
$id = trim($_POST["id"] ?? NULL);
$nome = trim($_POST["nome"] ?? NULL);
$email = trim($_POST["email"] ?? NULL);
$login = trim($_POST["login"] ?? NULL);
$senha = trim($_POST["senha"] ?? NULL);
$senha2 = trim($_POST["senha2"] ?? NULL);

//vereficar se estao braco ou sao validos

if (empty ($nome)){
  mensagem("prencha o nome");
}else if(empty ($login)){
  mensagem("prencga o login");
}else if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
  mensagem("prencha um email valido");
}else if($senha != $senha2){
  mensagem("a senha digita nao é igual a senha registrada");
}

//inserir ou atualizar 
if(empty ($id)){
  //inserir
  if(empty ($senha)){
    mensagem("digite a sua senha");
  }
  //critografar senha
  $senha = password_hash($senha, PASSWORD_DEFAULT);
  //echo $senha;

  //sql para gravar no banco de dodos
  $sql = "insert into usuario values (NULL, '{$nome}', '{$email}', '{$login}','{$senha}')";

}else if(empty ( $senha)){
  //update menos a senha 
    $sql ="update usuario set nome = '{$nome}', login = '{$login}', email='{$email}' where id = {$id} limit 1";
}else{
  //update exclusivo a senha
  //cripitografar senha
  $senha = password_hash($senha, PASSWORD_DEFAULT);
  $sql ="update usuario set nome = '{$nome}', login = '{$login}', email='{$email}' where id = {$id} limit 1";
}


//execultar
if( mysqli_query($con, $sql)){
  mensagem("registro salvo com sucesso");
} else{
  mensagem("erro ao salvar registro");
}