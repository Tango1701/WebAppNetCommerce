<?php

    include_once("conexao.php");
    
    $user = $_GET['user'];

    $hoje = date("Y-m-d");

    $string_select = "SELECT * FROM produtoaceite WHERE Estado = 'Activo' AND Id_Usuario != '$user' AND Time = '$hoje'";

    $recebe = mysqli_query($conect, $string_select);

    while($linha = mysqli_fetch_assoc($recebe)){

        echo "<div class='card' onclick='abrir(" . $linha['Id_Produto'] . ")'>";
        echo "<div class='picture'>";
        echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."'>";
        echo "</div> ";
        echo "<div class='cardTxt'> ";
        echo "<p>" . $linha['Nome'] . "</p> ";
        echo "<input name='Id_Produto' id='Id_Produto' value=" . $linha['Id_Produto'] . " hidden> <br>";
        echo "<p>" . $linha['Preco'] . " AOA</p>";
        echo "</div> ";
        echo "</div> ";
    }
    


?>