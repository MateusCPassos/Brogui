<?php
    //recuperar o id enviado por get
    $id = $_GET["id"] ?? NULL;

    //echo $id;

    if(empty($id)){
        echo "<p>noticia invalida</p>";
    }
    else{
        $sql = "select *, date_format(data, '%d/%m/%Y') data
         from noticia where id= {$id}";
        $consulta = mysqli_query($con, $sql);

        $dados = mysqli_fetch_array(($consulta));
        

        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $data = $dados["data"];
        $texto = $dados["texto"];

      
        echo "<h1>{$titulo}</h1>";
        echo "<p>Data da postagem: {$data}</p>";
        echo nl2br($texto);


        
    }

?>