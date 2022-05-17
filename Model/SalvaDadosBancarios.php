
<?php

// Importing DBConfig.php file.
include_once("conexao.php");

// Variáveis dos campos
$Banco = $_GET['Banco'];
$Titular = $_GET['Titular'];
$Conta = $_GET['Conta'];
$IBAN = $_GET['IBAN'];
$Doc_BI = $_FILES['Doc_BI']['name'];
$Doc_Conta = $_FILES['Doc_Conta']['name'];
$Doc_Photo = $_FILES['Doc_Photo']['name'];
$Id_Usuario = "u32";


// Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "INSERT INTO dadosbancarios(Id_Usuario, Banco, Num_Conta, IBAN, Doc_BI, Doc_Conta) 
VALUES ('$user','$Banco', '$Conta','$IBAN','$Doc_BI','$Doc_Conta')";

if (mysqli_query($conect, $Sql_Query)) {

  // Actualizar a foto de perfil do usuário
  $trocaFotoPerfil = "UPDATE usuario SET Foto = '$Doc_Photo' WHERE Id_Usuario = '$Id_Usuario'";
  if (mysqli_query($conect, $Sql_Query)) 
  {
    $nova_Foto = strtolower($_FILES['Doc_Photo']['name']);
    move_uploaded_file($_FILES['Doc_Photo']['name'], "./Files/$Id_Usuario/$nova_Foto");
  }

  // Mover os doc carregados para o servidor
  $novo_conta = strtolower($_FILES['Doc_Conta']['name']);   
  $novo_BI = strtolower($_FILES['Doc_BI']['name']);   

  if( mkdir("../Files/$Id_Usuario/Doc/")){
    mkdir("Files/$Id_Usuario/Doc/");
    move_uploaded_file($_FILES['Doc_Conta']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_conta");
    move_uploaded_file($_FILES['Doc_BI']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_BI");
  }
  else{
      mkdir("../Files/$Id_Usuario/Doc/");
      move_uploaded_file($_FILES['Doc_Conta']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_conta");            
      move_uploaded_file($_FILES['Doc_BI']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_BI");            
  }


  // Echo the message.
  echo $Id_Usuario;
} else {

  echo 'Try Again';
}
//   mysqli_close($con);
?>