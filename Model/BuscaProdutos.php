<?php

    include_once("conexao.php");

    $string_select = "SELECT * FROM produtoaceite WHERE Estado = 'Activo'";

    $recebe = mysqli_query($conect, $string_select);

    while($linha[] = mysqli_fetch_assoc($recebe)){
        $item = $linha;
        $json = json_encode($item);
    }

    echo $json

?>