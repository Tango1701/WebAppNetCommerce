

<?php
 
 // Importing DBConfig.php file.
 include_once("conexao.php");

 $name = $_GET['nome'];
 $email = $_GET['email'];
 $senha = $_GET['senha'];


 $novoU = "SELECT Proximo_User FROM config WHERE ID = 1";
 $result = mysqli_query($conect, $novoU);
 $result = mysqli_fetch_assoc($result);

 $user = $result['Proximo_User'];
  $Id_Usuario = $result['Proximo_User'];

  // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "INSERT INTO usuario(Id_Usuario, Nome, Email, Senha) 
              VALUES ('$user', '$name','$email','$senha')";
  
  if(mysqli_query($conect, $Sql_Query)){

    $user = substr($user, 1);
    $soma = $user + 1;
    $novoId = "u".$soma;

    $novoUser = "UPDATE config SET Proximo_User = '$novoId'  WHERE ID = 1";
    $foi = mysqli_query($conect, $novoUser);

    mkdir("../Files/$Id_Usuario/");

  // If the record inserted successfully then show the message.
   $MSG = $Id_Usuario;
  
 // Echo the message.
  echo $Id_Usuario;
  
  }
  else{
  
  echo 'Try Again';
  
  }
//   mysqli_close($con);
 ?>