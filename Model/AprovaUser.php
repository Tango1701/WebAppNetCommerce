<?php


include_once("conexao.php");

        $user = $_GET["user"];

        $string_select = "SELECT * FROM usuario_pendente WHERE Id_Usuario = '$user' ";
        $recebe = mysqli_query($conect, $string_select);

        $linha = mysqli_fetch_assoc($recebe);

        $Nome = $linha['Nome'];
        $Email = $linha['Email'];
        $EstadoCivil = $linha['Estado_Civil'];
        $Sexo = $linha['Sexo'];
        $BI = $linha['BI'];
        $Telefone = $linha['Telefone'];
        $Morada = $linha['Morada'];
        $Provincia = $linha['Provincia'];
        $DataNascimento = $linha['Data_Nascimento'];
        $Foto = $linha['Foto'];
        $Senha = $linha['Senha'];


        $string_insert = "INSERT INTO usuario(Id_Usuario, Nome, Data_Nascimento, BI, Estado_Civil, Sexo, 
        Email, Senha, Foto, Telefone, Morada, Provincia)
        VALUES ('$user','$Nome','$DataNascimento','$BI', '$EstadoCivil','$Sexo','$Email','$Senha','$Foto'
        ,'$Telefone','$Morada','$Provincia')";

        $recebe = mysqli_query($conect, $string_insert);

        if ($recebe) {
            $string_delete = "DELETE FROM usuario_pendente WHERE Id_Usuario = '$user'";
           $recebe = mysqli_query($conect, $string_delete);

            echo $Senha;
        }
        else{
            echo "Deu pau";
        }
?>