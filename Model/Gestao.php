
<?php

class Gestao
{

    function Aprovar()
    {
        include_once("conexao.php");

        $idProduto = $_POST["Id_Produto"];

        $string_select = "SELECT * FROM produto WHERE Id_Produto = '$idProduto' ";
        $recebe = mysqli_query($conect, $string_select);

        $linha = mysqli_fetch_assoc($recebe);

        $usuario = $linha['Id_Usuario'];
        $nome = $linha['Nome'];
        $tipo = $linha['Tipo'];
        $preco = $linha['Preco'];
        $imagem = $linha['Imagem'];
        $video = $linha['Video'];
        $descricao = $linha['Descricao'];
        $time = $linha['Time'];

        $string_insert = "INSERT INTO produtoaceite (Id_Produto, Id_Usuario, Nome, Tipo, Preco, Imagem, Video, Descricao, Time) 
            VALUES ('$idProduto','$usuario','$nome','$tipo', $preco,'$imagem', null,'$descricao','$time')";
        $recebe = mysqli_query($conect, $string_insert);

        if ($recebe) {
            $string_delete = "DELETE FROM produto WHERE Id_Produto = '$idProduto'";
            $recebe = mysqli_query($conect, $string_delete);
            header("location:/NetCommerce/index.php/home");
        }
    }

    function Rejeitar()
    {
        include_once("conexao.php");

        $idProduto = $_POST["Id_Produto"];


        $string_select = "SELECT * FROM produto WHERE Id_Produto = '$idProduto' ";
        $recebe = mysqli_query($conect, $string_select);

        $linha = mysqli_fetch_assoc($recebe);

        $usuario = $linha['Id_Usuario'];


        $delete = "DELETE FROM produto WHERE Id_Produto = '$idProduto' ";
        $recebe = mysqli_query($conect, $delete);


        if ($recebe) {
            $insert = "INSERT INTO rejeitado(Id_Usuario, Id_Produto) VALUES ('$usuario', $idProduto)";
            $recebe = mysqli_query($conect, $insert);

            // if($recebe)
            //     header("location:/NetCommerce/index.php/home");
        }
    }

    function AprovarUsuario()
    {
        include_once("conexao.php");

        $user = $_GET["user"];

        $string_select = "SELECT * FROM usuario_pendente WHERE Id_Usuario = '$user' ";
        $recebe = mysqli_query($conect, $string_select);

        $linha = mysqli_fetch_assoc($recebe);

        $Nome = $linha['Nome'];
        $Email = $linha['Email'];
        $EstadoCivil = $linha['EstadoCivil'];
        $Sexo = $linha['Sexo'];
        $BI = $linha['BI'];
        $Telefone = $linha['Telefone'];
        $Morada = $linha['Morada'];
        $Provincia = $linha['Provincia'];
        $DataNascimento = $linha['DataNascimento'];
        $Foto = $linha['Foto'];

        $string_insert = "INSERT INTO usuario(Id_Usuario, Nome, Data_Nascimento, BI, Estado_Civil, Sexo, 
        Email, Senha, Foto, Telefone, Morada, Provincia)
        VALUES ('$user','$Nome','$DataNascimento','$BI', $EstadoCivil,'$Sexo','$Email','$Senha','$Foto'
        ,'$Telefone','$Morada','$Provincia')";

        $recebe = mysqli_query($conect, $string_insert);

        if ($recebe) {
            $string_delete = "DELETE FROM usuario_pendente WHERE WHERE Id_Usuario = '$user'";
            $recebe = mysqli_query($conect, $string_delete);
            header("location:/NetCommerce/index.php/home");
        }
    }
}

?>