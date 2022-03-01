<?php

    include_once("conexao.php");

    $user = $_GET['user'];

    $string_select = "SELECT Nome FROM tipo";
    $recebe = mysqli_query($conect, $string_select);
    
    while($linha = mysqli_fetch_assoc($recebe)){

        $Busca = "SELECT * FROM produtoaceite WHERE Tipo = '".$linha['Nome']."' AND Estado = 'Activo' AND Id_Usuario != '$user' ";
        $result = mysqli_query($conect, $Busca);

        echo "<br> <h2>".$linha['Nome']."</h2>";
        echo "<div class='colecao'>";

        while($dados = mysqli_fetch_assoc($result)){
           
            echo "<div class='card' onclick='abrir(" . $dados['Id_Produto'] . ")'>";
            echo "<div class='picture'>";
            echo "<img src='http://localhost/NetCommerce/files/" . $dados['Id_Usuario'] . "/" . $dados['Id_Produto'] . "/" . $dados['Imagem'] . "'>";
            echo "</div> ";
            echo "<h4>" . $dados['Nome'] . "</h4> ";
            echo "<input name='Id_Produto' id='Id_Produto' value=" . $dados['Id_Produto'] . " hidden> <br>";
            echo "<p>" . $dados['Preco'] . " AOA</p>";
            echo "</div> ";
        }
        echo "</div> <br>";
       
    }


?>