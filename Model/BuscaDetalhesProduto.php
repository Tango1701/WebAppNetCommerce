
<?php

include_once("conexao.php");

$prod = $_GET['Id_Produto'];

$string_select = "SELECT * FROM produtoaceite WHERE Id_Produto = '$prod'";

$recebe = mysqli_query($conect, $string_select);

$linha = mysqli_fetch_assoc($recebe);

    // echo "<h3>Detalhes</h3> <br>";
    echo "<div id='imagensDetalhes'>";
        echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";
        // echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";
        // echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";
        // echo "<img src='/NetCommerce/Files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."' >";  
    echo "</div><br>";

    echo "<div class='opcoesVisualizacao'>";
    echo "<i title='Gosto' class='fa fa-heart' style='font-size: 20px' onclick='colocarGosto(".$linha['Id_Produto'].")'></i>";
    echo "<i title='Detalhes' class='fa fa-clipboard-list' style='font-size: 20px'></i>";
    echo "<i title='Add Carrinho' class='fa fa-cart-plus' style='font-size: 20px' onclick='addCarrinho(".$linha['Id_Produto'].")'></i>";
    // echo "<i title='Comprar Agora' class='fa fa-money-bill-wave' style='font-size: 20px'></i>";
    echo "</div>";
    echo "<div>";

    echo "</div><br>";

    echo "<input type='text' value='".$linha['Id_Produto']."' id='idProd' hidden> ";
    echo "<div id='descricaoDetalhes'>";
    echo "<label class='ttl'> Marca </label> <br>";
    echo "<label> ".$linha['Nome']."</label> <br>";
    echo "<label class='ttl'> Tipo </label> <br>";
    echo "<label>".$linha['Tipo']."</label> <br>";
    echo "<label class='ttl'> Preço </label> <br>";
    echo "<label>".$linha['Preco']." AOA</p> ";
    // echo "<label class='ttl'>Descrição</label> <br> <p>".$linha['Descricao']."</p>";
    echo "<input type='button' value='Comprar Agora' class='btn-primary' id='btnCompra'>";

    // echo "<br> <br>";


?>