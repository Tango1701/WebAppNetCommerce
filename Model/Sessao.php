<?php


class Sessao
{
    function login()
    {
        include_once("conexao.php");

        $user = $_POST["userN"];
        $pass = $_POST["passW"];

        if (isset($user) && isset($pass)) {

            $string_select = "SELECT * FROM funcionario WHERE Id_Funcionario = '$user' AND Senha = '$pass'";
            $recebe = mysqli_query($conect, $string_select);

            if ($recebe) {
                $linha = mysqli_fetch_assoc($recebe);

                if ($linha['Id_Funcionario'] == $user && $linha['Senha'] == $pass) {
                    session_start();
                    $_SESSION["Usuario"] = $user;
                    $_SESSION["Senha"] = $pass;
                    $_SESSION["Nome"] = $linha['Nome'];
                    header("location: /NetCommerce/index.php/home");
                }
                else{
                    unset($recebe);

                    $busca = "SELECT * FROM usuario WHERE Email = '$user' AND Senha = '$pass' ";
                    $recebe = mysqli_query($conect, $busca);
                   
                    $linha = mysqli_fetch_assoc($recebe);
                    
                    if ($linha['Email'] == $user && $linha['Senha'] == $pass) {
                            session_start();
                            $_SESSION["Id_Usuario"] = $linha['Id_Usuario'];
                            $_SESSION["Senha"] = $linha['Senha'];
                            $_SESSION["Nome"] = $linha['Nome'];
                            $_SESSION["Email"] = $linha['Email'];
                            $_SESSION["Foto"] = $linha['Foto'];

                            echo $_SESSION["Id_Usuario"];
                            header("location: /NetCommerce/index.php/userhome");
                    }else{
                        echo "<script> alert('Usuario ou senha incorrectos!'); </script>";
                        header("location: /NetCommerce/index.php");
                    }
                }

            }
        } else {
            echo "<script> alert('Preencha os Campos!'); </script>";
        }
    }


    function registrar(){
        // Importing DBConfig.php file.
        include_once("conexao.php");
       
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $fotogragia = $_POST['foto'];
       
        $_FILES['foto']['name'] = $fotogragia;

        // $novo_nome = strtolower($_FILES['foto']['name']);   
        echo $foto;

        $novoU = "SELECT Proximo_User FROM config WHERE ID = 1";
        $result = mysqli_query($conect, $novoU);
        $result = mysqli_fetch_assoc($result);
       
        $user = $result['Proximo_User'];
        $Id_Usuario = $result['Proximo_User'];
       
         // Creating SQL query and insert the record into MySQL database table.
        $Sql_Query = "INSERT INTO usuario(Id_Usuario, Nome, Email, Senha, Foto) 
                     VALUES ('$user', '$nome','$email','$senha','$fotogragia')";

         if(mysqli_query($conect, $Sql_Query)){
            echo $user.$nome.$email.$senha;

       
           $user = substr($user, 1);
           $soma = $user + 1;
           $novoId = "u".$soma;
       
           $novoUser = "UPDATE config SET Proximo_User = '$novoId'  WHERE ID = 1";
           $foi = mysqli_query($conect, $novoUser);
       
           mkdir("./Files/$Id_Usuario/");
           move_uploaded_file($_FILES['foto']['tmp_name'], "./Files/$Id_Usuario/$foto");
           
           if($foi){
            // header("location: /NetCommerce/index.php");
           }
       
         echo $Id_Usuario;
         
         }
         else{
         
         echo 'Try Again';
         
         }
       
    }


    function logOff()
    {
        session_start();
        unset($_SESSION["Id_Usuario"]);
        unset($_SESSION['Senha']);
        session_destroy();
        header("location: /NetCommerce/index.php");
    }
}
