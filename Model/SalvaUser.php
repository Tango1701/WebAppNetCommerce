

<?php

// Importing DBConfig.php file.
include_once("conexao.php");

// Variáveis dos campos
$Nome = $_GET['Nome'];
$Email = $_GET['Email'];
$EstadoCivil = $_GET['EstadoCivil'];
$Sexo = $_GET['Sexo'];
$BI = $_GET['BI'];
$Telefone = $_GET['Telefone'];
$Morada = $_GET['Morada'];
$Provincia = $_GET['Provincia'];
$DataNascimento = $_GET['DataNascimento'];

// Pegar index do novo User
$novoU = "SELECT Proximo_User FROM config WHERE ID = 1";
$result = mysqli_query($conect, $novoU);
$result = mysqli_fetch_assoc($result);

$user = $result['Proximo_User'];
$Id_Usuario = $result['Proximo_User'];

// Gerando Nova senha
$Senha = md5(time() . $user);

// Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "INSERT INTO usuario(Id_Usuario, Nome, Data_Nascimento, BI, Estado_Civil, Sexo, Email, Senha, Foto, Telefone, Morada, Provincia) 
VALUES ('$user','$Nome','$DataNascimento','$BI','$EstadoCivil','$Sexo','$Email','$Senha','foto','$Telefone','$Morada','$Provincia')";

if (mysqli_query($conect, $Sql_Query)) {

  $user = substr($user, 1);
  $soma = $user + 1;
  $novoId = "u" . $soma;

  $novoUser = "UPDATE config SET Proximo_User = '$novoId'  WHERE ID = 1";
  $foi = mysqli_query($conect, $novoUser);

  mkdir("../Files/$Id_Usuario/");

  // If the record inserted successfully then show the message.
  $MSG = $Id_Usuario;

  // Echo the message.
  echo $Id_Usuario;
} else {

  echo 'Try Again';
}
//   mysqli_close($con);
?>