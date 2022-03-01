<?php

    include_once("conexao.php");
    
    $user = $_GET['user'];

    $hoje = date("Y-m-d");

    $string_select = "SELECT * FROM produtoaceite WHERE Estado = 'Activo' AND Id_Usuario != '$user' AND Time = '$hoje'";

    $recebe = mysqli_query($conect, $string_select);

    while($linha = mysqli_fetch_assoc($recebe)){
        

        echo "<div class='card' onclick='abrir(" . $linha['Id_Produto'] . ")'>";
        echo "<div class='picture'>";
        echo "<img src='http://localhost/NetCommerce/files/" . $linha['Id_Usuario'] . "/" . $linha['Id_Produto'] . "/" . $linha['Imagem'] . "'>";
        echo "</div> ";
        echo "<h4>" . $linha['Nome'] . "</h4> ";
        echo "<input name='Id_Produto' id='Id_Produto' value=" . $linha['Id_Produto'] . " hidden> <br>";
        echo "<p>" . $linha['Preco'] . " AOA</p>";
        echo "</div> ";
    }


?>