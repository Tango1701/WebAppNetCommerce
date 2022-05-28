<?php

include_once("conexao.php");

$user = $_GET['user'];


$string_select = "SELECT * FROM carteira WHERE Id_Usuario = '$user'";
$recebe = mysqli_query($conect, $string_select);


while($linha = mysqli_fetch_assoc($recebe)){

    echo "<div id='linha'><h5>".$linha['Montante']."</h5></div>";
  
}

// echo "<div id='linha'> <label>Total Rendimentos Obtidos</label> <label>".$soma." AOA</label> </div>";

?>