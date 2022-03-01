
<?php

include_once("conexao.php");

$user = $_GET['user'];


$string_select = "SELECT * FROM produto WHERE Id_Usuario = '$user'";
$recebe = mysqli_query($conect, $string_select);
if($recebe){
    echo "<h3>Vendas Pendentes</h3>";
    echo "<table>";
    echo "<tr> 
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Tipo</th>
        </tr>";
    while($linha = mysqli_fetch_assoc($recebe)){

        echo "<tr>";
        echo "<td>".$linha['Id_Produto']."</td>";
        echo "<td>".$linha['Nome']."</td>";
        echo "<td>".$linha['Preco']."</td>";
        echo "<td>".$linha['Tipo']."</td>";
        echo "</tr>";
    
    }
    echo "</table>";
}else{
    echo "<h2>Sem Vendas Pendentes</h2>";
    
}



?>