

<?php

include_once("conexao.php");

$user = $_GET['user'];

// Vendas que foram aprovadas
$vendas_aprovadas = "SELECT * FROM produtoaceite WHERE Estado = 'Activo' AND Id_Usuario = '$user' ";
$recebe = mysqli_query($conect, $vendas_aprovadas);

$venda_A = 0;
while($linha = mysqli_fetch_assoc($recebe)){
    $venda_A = $venda_A + 1;
}

echo $venda_A;




?>