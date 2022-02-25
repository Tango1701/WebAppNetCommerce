

<?php
 
 // Importing DBConfig.php file.
 include_once("conexao.php");

 $Id_Usuario = $_GET['Id_Usuario'];
 $name = $_GET['marca']." - ".$_GET['modelo'];
 $tipo = $_GET['tipo'];
 $preco = $_GET['preco'];
 $descricao = $_GET['descricao'];
 $tempo_uso = $_GET['tempo'];
 $detalhes =  "Tempo de uso ".$tempo_uso." anos. \n".$descricao;

 $imagem = $_GET['image'];

  // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "INSERT INTO produto ( Id_Usuario, Nome, Tipo, Preco, Imagem, Video, Descricao) 
 VALUES ('$Id_Usuario', '$name','$tipo','$preco','$imagem', null,'$detalhes')";
  
  if(mysqli_query($conect, $Sql_Query)){

    $pegaIdProduto = "SELECT Proximo_Prod FROM config WHERE ID = 1";
    $result = mysqli_query($conect, $pegaIdProduto);
    $result = mysqli_fetch_assoc($result);

    $novoId = $result['Proximo_Prod'];

  // If the record inserted successfully then show the message.
  $MSG = "O produto foi registrado e aguarda aprovação. \n Leve ao estabelecimento NetCommerce para ser avaliado" ;

   mkdir("../Files/$Id_Usuario/$novoId/");
   move_uploaded_file($imagem, "../Files/$Id_Usuario/$novoId/"  );
  

  $novoId = $novoId + 1;
  $novoP = "UPDATE config SET Proximo_Prod = $novoId  WHERE ID = 1";
  mysqli_query($conect, $novoP);

 // Converting the message into JSON format.
 $json = json_encode($MSG);
  
 // Echo the message.
  echo $json ;
  
  }
  else{
  
  echo 'Try Again';
  
  }
//   mysqli_close($con);
 ?>