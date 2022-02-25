<?php
    $conect = mysqli_connect("localhost","root","","netcommerce");
    if(mysqli_connect_error())
    {
        echo "Erro: ".mysqli_connect_errno();
    }
    else{
        echo "";
    }
?>