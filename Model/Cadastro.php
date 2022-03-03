
<?php
// Importing DBConfig.php file.
        include_once("conexao.php");
       
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        // $fotogragia = $_POST['foto'];
       
        $foto = $_FILES['foto']['name'];

        // $novo_nome = strtolower($_FILES['foto']['name']);   
        echo $foto;

        $novoU = "SELECT Proximo_User FROM config WHERE ID = 1";
        $result = mysqli_query($conect, $novoU);
        $result = mysqli_fetch_assoc($result);
       
        $user = $result['Proximo_User'];
        $Id_Usuario = $result['Proximo_User'];
       
         // Creating SQL query and insert the record into MySQL database table.
        $Sql_Query = "INSERT INTO usuario(Id_Usuario, Nome, Email, Senha, Foto) 
                     VALUES ('$user', '$nome','$email','$senha','$foto')";

         if(mysqli_query($conect, $Sql_Query)){
            // echo $Id_Usuario.$nome.$email.$senha;

       
           $user = substr($user, 1);
           $soma = $user + 1;
           $novoId = "u".$soma;
       
           $novoUser = "UPDATE config SET Proximo_User = '$novoId'  WHERE ID = 1";
           $foi = mysqli_query($conect, $novoUser);
       
           if(mkdir("../Files/$Id_Usuario")){
                move_uploaded_file($_FILES['foto']['tmp_name'], "../Files/$Id_Usuario/$foto");
            }
            else{
                mkdir("../Files/$Id_Usuario");
                move_uploaded_file($_FILES['foto']['tmp_name'], "../Files/$Id_Usuario/$foto");            
            }
           
           if($foi){
            header("location: /NetCommerce/index.php");
           }
       
         echo $Id_Usuario;
         
         }
         else{
         
         echo 'Try Again';
         
         }

         ?>