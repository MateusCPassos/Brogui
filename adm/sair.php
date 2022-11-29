<?php
  //iniciar sessao
  session_start();
  //desresgistar a sessao brogui
  unset ($_SESSION["brogui"]);
  //enviar para a pagina index
echo "<script>location.href='index.php'</script>";