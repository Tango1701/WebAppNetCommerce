
<?php

include_once("conexao.php");

$hoje = date("Y-m-d");

$user = $_GET['user'];

$string_select = "SELECT * FROM produtoaceite WHERE Estado = 'Activo' AND Id_Usuario != '$user' AND Time = '$hoje'";

$recebe = mysqli_query($conect, $string_select);

while($linha = mysqli_fetch_assoc($recebe)){
    
    echo "<div onclick='abrir(" . $linha['Id_Produto'] . ")'>";
    echo "<img src='http://localhost/NetCommerce/files/" . $linha['Id_Usuario'] . "/" . $linha['Id_Produto'] . "/" . $linha['Imagem'] . "'>";
    echo "<div class='txt'>";
    echo "<h2>" . $linha['Nome'] . "</h2> ";
    echo "<input name='Id_Produto' id='Id_Produto' value=" . $linha['Id_Produto'] . " hidden> <br>";
    echo "<h3>" . $linha['Preco'] . " AOA</h3>";
    echo "</div> ";
    echo "</div> ";

}


?>