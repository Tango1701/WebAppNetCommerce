
<?php

include_once("conexao.php");

$categoria = $_GET['categoria'];
$user = $_GET['user'];


    $Busca = "SELECT * FROM produtoaceite WHERE Tipo = '".$categoria."' AND Estado = 'Activo' AND Id_Usuario != '$user' ";
    $result = mysqli_query($conect, $Busca);

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
   



?>