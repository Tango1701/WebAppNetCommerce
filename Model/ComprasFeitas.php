
<?php

include_once("conexao.php");

$Id_Usuario = $_GET['Id_Usuario'];

$pp = "SELECT * FROM produtopago WHERE Id_Usuario = '$Id_Usuario'";
$recebe = mysqli_query($conect, $pp);

$json = "Não efectuou nenhuma venda";

while($linha = mysqli_fetch_assoc($recebe)){

    $Id_Prod = $linha['Id_Produto'];
    $string_select = "SELECT * FROM produtoaceite WHERE Id_Produto = '$Id_Prod'";
    $result = mysqli_query($conect, $string_select);

    $item = mysqli_fetch_assoc($result);
    $json = json_encode($item);
}

echo $json;

?>