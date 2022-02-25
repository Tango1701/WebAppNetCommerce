<?php

    include_once("conexao.php");

    // Pegar o id do produto e do usuario que quer comprar
    $Id_Produto = $_GET['Id_Produto'];
    $Id_Usuario = $_GET['Id_Usuario'];

    // Remover o produto da lista de produtos divulgados 
    $altera = "UPDATE produtoaceite SET Estado = 'Inactivo' WHERE Id_Produto = $Id_Produto";
    $recebe = mysqli_query($conect, $altera);

    if($recebe){
        // Colocar na tabela Produto pago
        $compra = "INSERT INTO produtoPago(Id_Usuario, Id_Produto) VALUES ('$Id_Usuario', $Id_Produto)";
        $recebe = mysqli_query($conect, $compra);
        
        if($recebe){
            echo "Produto Comprado com sucesso. Va pegar ao nosso estabelecimento.";
            header("location: /NetCommerce/View/UserHome.php");
        }
        else
            echo "Erro ao comprar!";
    }else
        echo "Erro ao alterar estado";
    

?>