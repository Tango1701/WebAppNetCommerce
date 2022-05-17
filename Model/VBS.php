

<?php

include_once("conexao.php");

$user = $_GET['user'];


// Vendas que deram certo
$vendas_sucedidas = "SELECT * FROM produtoaceite WHERE Estado = 'Inactivo' AND Id_Usuario = '$user' ";
$recebe = mysqli_query($conect, $vendas_sucedidas);

$venda_S = 0;
while($linha = mysqli_fetch_assoc($recebe)){
    $venda_S = $venda_S + 1;
}

echo $venda_S;




?>