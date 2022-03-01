
<?php

include_once("conexao.php");

$user = $_GET['user'];


$string_select = "SELECT * FROM produtoaceite WHERE Id_Usuario = '$user' AND Estado = 'Activo'";
$recebe = mysqli_query($conect, $string_select);

echo "<h3 >Vendas Aprovadas</h3>";
echo "<table>";
echo "<tr> 
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Tipo</th>
    </tr>";
    $soma = 0;
while($linha = mysqli_fetch_assoc($recebe)){

    echo "<tr>";
    echo "<td>".$linha['Id_Produto']."</td>";
    echo "<td>".$linha['Nome']."</td>";
    echo "<td>".$linha['Preco']."</td>";
    echo "<td>".$linha['Tipo']."</td>";
    echo "</tr>";

    $soma = $soma + $linha['Preco'];
   
}

echo "</table>";

echo "<div id='linha'> <h3>Total Rendimentos Esperado</h3> <label>".$soma." AOA</label> </div>";


?>