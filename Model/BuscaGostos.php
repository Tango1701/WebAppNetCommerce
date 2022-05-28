<?php

    include_once("conexao.php");

    $user = $_GET['user'];

    $string_select = "SELECT * FROM gosto WHERE Id_Usuario = '$user'";
    $recebe = mysqli_query($conect, $string_select);
    
    while($linha = mysqli_fetch_assoc($recebe)){

        $idProd = $linha['Id_Produto'];

        $Busca = "SELECT * FROM produtoaceite WHERE Id_Produto = $idProd ";
        $result = mysqli_query($conect, $Busca);

        echo "<div class='colecaoGostos'>";

        while($dados = mysqli_fetch_assoc($result)){
           
            echo "<div class='card' onclick='abrir(" . $dados['Id_Produto'] . ")'>";
            echo "<div class='picture'>";
            echo "<img src='http://localhost/NetCommerce/files/" . $dados['Id_Usuario'] . "/" . $dados['Id_Produto'] . "/" . $dados['Imagem'] . "'>";
            echo "</div> ";
            echo "<div class='cardTxt'> ";
            echo "<h4>" . $dados['Nome'] . "</h4> ";
            echo "<input name='Id_Produto' id='Id_Produto' value=" . $dados['Id_Produto'] . " hidden> <br>";
            echo "<p>" . $dados['Preco'] . " AOA</p>";
            echo "</div> ";
            echo "</div> ";
            echo "<hr> ";
            echo "<div id='op'> ";
            echo "<i class='fa fa-trash'></i> ";
            echo "<i class='fa fa-cart-plus'></i> ";
            echo "</div> ";
        }
        echo "</div> <br>";
       
    }


?>