



<?php

include_once("conexao.php");

$user = $_GET['user'];

// Vendas a espera
$vendas_pendentes = "SELECT * FROM produto WHERE Id_Usuario = '$user' ";
$recebe = mysqli_query($conect, $vendas_pendentes);

$venda_P = 0;
while($linha = mysqli_fetch_assoc($recebe)){
    $venda_P = $venda_P + 1;
}

echo $venda_P;




?>