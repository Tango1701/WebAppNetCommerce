

<?php

include_once("conexao.php");

$user = $_GET['user'];


$string_select = "SELECT * FROM produtoaceite WHERE Id_Usuario = '$user' AND Estado = 'Inactivo'";
$recebe = mysqli_query($conect, $string_select);

echo "<h3 '>Vendas Bem Sucedidas</h3>";
echo "<table>";
echo "<tr> 
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Tipo</th>
        <th>Desconto Percentual</th>
        <th>SubTotal</th>
    </tr>";
    $soma = 0;
while($linha = mysqli_fetch_assoc($recebe)){

    echo "<tr>";
    echo "<td>".$linha['Id_Produto']."</td>";
    echo "<td>".$linha['Nome']."</td>";
    echo "<td>".$linha['Preco']."</td>";
    echo "<td>".$linha['Tipo']."</td>";
    echo "<td>10%</td>";
    $preco = $linha['Preco'] * 0.9;

    echo "<td>".$preco."</td>";
    echo "</tr>";

    $soma = $soma + $linha['Preco'];
   
}

echo "</table>";

$soma = $soma * 0.9;

echo "<div id='linha'> <h3>Total Rendimentos Obtidos</h3> <label>".$soma." AOA</label> </div>";





?>