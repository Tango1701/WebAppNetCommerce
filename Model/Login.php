<?php

    include_once("conexao.php");

    // email e senha digitados pelo user
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    // Buscar email e senha na bd
    $busca = "SELECT * FROM usuario WHERE Email = '$email' AND Senha = '$senha' ";
    $recebe = mysqli_query($conect, $busca);
    $linha = mysqli_fetch_assoc($recebe);
    

    echo $linha['Id_Usuario'];

?>