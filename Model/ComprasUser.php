<?php

include_once("conexao.php");

$Id_Usuario = $_GET['user'];

$pp = "SELECT * FROM produtopago WHERE Id_Usuario = '$Id_Usuario'";
$recebe = mysqli_query($conect, $pp);

$soma = 0;

echo "<div id='linha'><h5>Compras Feitas</h5></div>";
while($linha = mysqli_fetch_assoc($recebe)){

    $Id_Prod = $linha['Id_Produto'];
    $string_select = "SELECT * FROM produtoaceite WHERE Id_Produto = '$Id_Prod'";
    $result = mysqli_query($conect, $string_select);

    $dados = mysqli_fetch_assoc($result);

    echo "<div class='CF'>";
    echo "<div class='CFIMG'>";
    echo "<img src='/NetCommerce/Files/".$dados['Id_Usuario']."/".$dados['Id_Produto']."/".$dados['Imagem']."' >";
    echo "</div>";
    echo "<div class='desc'>";
    echo "<label> ".$dados['Nome']." - </label> ";
    echo "<label>".$dados['Preco']." AOA</p>";
    echo "</div>";
    echo "</div>";
    $soma = $soma + $dados['Preco'];

}
    echo "<div class='CF'> <h5>Total Gasto </h5> <label>".$soma." AOA</label> </div>";


?>