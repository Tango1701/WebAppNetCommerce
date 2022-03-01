
<?php

include_once("conexao.php");

$prod = $_GET['Id_Produto'];

$string_select = "SELECT * FROM produtoaceite WHERE Id_Produto = '$prod'";

$recebe = mysqli_query($conect, $string_select);

$linha = mysqli_fetch_assoc($recebe);

    echo "<h3>Detalhes</h3> <br>";
    echo "<div id='imagensDetalhes'>";
        echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";
        echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";
        echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";
        echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";  
    echo "</div><br>";
    echo "<input type='text' value='".$linha['Id_Produto']."' id='idProd' hidden> ";

    echo "<label class='ttl'> Marca </label>";
    echo "<label> ".$linha['Nome']."</label> <br>";
    echo "<label class='ttl'> Tipo </label>";
    echo "<label>".$linha['Tipo']."</label> <br>";
    echo "<label class='ttl'> Preço </label>";
    echo "<label>".$linha['Preco']." AOA</p>";
    echo "<label class='ttl'>Descrição</label> <br> <p>".$linha['Descricao']."</p>";
    echo "<br> <br>";
    echo "<input type='button' value='Comprar' id='btnCompra' onclick='move()'> <br>";


?>