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
        
        include_once("conexao.php");
       
        // Dados Pessoais
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $EstadoCivil = $_POST['EstadoCivil'];
        $Sexo = $_POST['Sexo'];
        $BI = $_POST['BI'];
        $Telefone = $_POST['Telefone'];
        $Morada = $_POST['Morada'];
        $Provincia = $_POST['Provincia'];
        $DataNascimento = $_POST['DataNascimento'];

        // Dados Bancarios
        $Banco = $_POST['Banco'];
        $Titular = $_POST['Titular'];
        $Conta = $_POST['Conta'];
        $IBAN = $_POST['IBAN'];

        // Documentos
        $Doc_BI = $_FILES['Doc_BI']['name'];
        $Doc_Conta = $_FILES['Doc_Conta']['name'];
        $Doc_Photo = $_FILES['Doc_Photo']['name'];

        echo $_FILES['Doc_Photo']['name'];
        echo " \n".$_FILES['Doc_Conta']['name'];
        echo " \n".$_FILES['Doc_BI']['name'];
       
        $novoU = "SELECT Proximo_User FROM config WHERE ID = 1";
        $result = mysqli_query($conect, $novoU);
        $result = mysqli_fetch_assoc($result);
       
        $user = $result['Proximo_User'];
        $Id_Usuario = $result['Proximo_User'];

         // Gerando Nova senha
         $Senha = md5(time() . $user);  
       
         // Creating SQL query and insert the record into MySQL database table.
        $Sql_Query = "INSERT INTO usuario_pendente(Id_Usuario, Nome, Data_Nascimento, BI, Estado_Civil, Sexo, Email, Senha, Foto, Telefone, Morada, Provincia) 
        VALUES ('$user','$Nome','$DataNascimento','$BI','$EstadoCivil','$Sexo','$Email','$Senha','$Doc_Photo','$Telefone','$Morada','$Provincia')";

         if(mysqli_query($conect, $Sql_Query)){

           // Novo ID do Usuário
           $user = substr($user, 1);
           $soma = $user + 1;
           $novoId = "u".$soma;
       
           $novoUser = "UPDATE config SET Proximo_User = '$novoId'  WHERE ID = 1";
           $foi = mysqli_query($conect, $novoUser);

           $Sql_Query = "INSERT INTO dadosbancarios(Id_Usuario, Banco, Num_Conta, IBAN, Doc_BI, Doc_Conta) 
           VALUES ('$Id_Usuario','$Banco', '$Conta','$IBAN','$Doc_BI','$Doc_Conta')";
            if(mysqli_query($conect, $Sql_Query)){

            //    pasta do usuário com os seus arquivos
           mkdir("./Files/$Id_Usuario/");
           $novo_nome = strtolower($_FILES['Doc_Photo']['name']);   
           move_uploaded_file($_FILES['Doc_Photo']['tmp_name'], "./Files/$Id_Usuario/$novo_nome");
           
           // Mover os doc carregados para o servidor
            $novo_conta = strtolower($_FILES['Doc_Conta']['name']);   
            $novo_BI = strtolower($_FILES['Doc_BI']['name']);   

            if( mkdir("./Files/$Id_Usuario/Doc/")){
                move_uploaded_file($_FILES['Doc_Conta']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_conta");
                move_uploaded_file($_FILES['Doc_BI']['tmp_name'], "Files/$Id_Usuario/Doc/$novo_BI");
            }
            else{
                mkdir("./Files/$Id_Usuario/Doc/");
                move_uploaded_file($_FILES['Doc_Conta']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_conta");            
                move_uploaded_file($_FILES['Doc_BI']['tmp_name'], "./Files/$Id_Usuario/Doc/$novo_BI");            
            }

        }

            echo "<script> alert('A sua conta está em revisão. Receberá um email com os seus dados de acesso')";

           if($foi){
            header("location: /NetCommerce/index.php/");
           }
       
     
         
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
        unset($_SESSION['Email']);
        unset($_SESSION["Foto"]);
        
        session_destroy();
        header("location: /NetCommerce/index.php");
    }
}
