<?php

    include_once("conexao.php");

    // Pegar o id do produto e do usuario que quer comprar
    $Id_Produto = $_GET['Id_Produto'];
    $Id_Usuario = $_GET['Id_Usuario'];

    // Remover o produto da lista de produtos divulgados 
    $insere = "INSERT INTO carrinho(Id_Usuario, Id_Produto) VALUES ('$Id_Usuario', $Id_Produto)";
    $recebe = mysqli_query($conect, $insere);

    if($recebe){
        echo "O Artigo foi adicionado ao carrinho";
    }else
        echo "<script> alert('Erro ao adicionar o artigo ao carrinho!') </script>";
    

?>