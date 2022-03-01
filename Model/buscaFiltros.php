
<?php

include_once("conexao.php");

$user = $_GET['user'];

$string_select = "SELECT Nome FROM tipo";
$recebe = mysqli_query($conect, $string_select);

// echo "<select id='filterBoo' onselect='filtrar(".$_SESSION['Id_Usuario'].")'>";
while($linha = mysqli_fetch_assoc($recebe)){
    echo "<option value='". $linha['Nome'] ."'>" . $linha['Nome'] . "</option>";
}
// echo "</select>";

?>