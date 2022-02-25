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

            if ($recebe != false) {
                
                $linha = mysqli_fetch_assoc($recebe);

                if ($linha['Id_Funcionario'] == $user && $linha['Senha'] == $pass) {

                    session_start();
                    $_SESSION["Usuario"] = $user;
                    $_SESSION["Senha"] = $pass;
                    $_SESSION["Nome"] = $linha['Nome'];
                    header("location: /NetCommerce/index.php/home");

                }else{
                
                    $busca = "SELECT * FROM usuario WHERE Email = '$user' AND Senha = '$pass' ";
                    $recebe = mysqli_query($conect, $busca);
                   
                    $linha = mysqli_fetch_assoc($recebe);
    
                    session_start();
                    $_SESSION["Id_Usuario"] = $linha['Id_Usuario'];
                    $_SESSION["Senha"] = $linha['Senha'];
                    $_SESSION["Nome"] = $linha['Nome'];
                    $_SESSION["Email"] = $linha['Email'];

                    header("location: /NetCommerce/index.php/userhome");
                }

            }
            
        } else {
            echo "<script> alert('Preencha os Campos!'); </script>";
        }
    }


    


    function logOff()
    {
        session_start();
        unset($_SESSION['Usuario']);
        unset($_SESSION['Senha']);
        session_destroy();
        header("location: /NetCommerce/index.php");
    }
}
