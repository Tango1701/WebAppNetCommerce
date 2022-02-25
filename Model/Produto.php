<?php

class Produto{

    function Comprar(){
        include_once("conexao.php");

        // Pegar o id do produto e do usuario que quer comprar
        $Id_Produto = $_POST['Id_Produto'];
        $Id_Usuario = $_POST['Id_Usuario'];

        echo $Id_Usuario;
        echo $Id_Produto;
        // Remover o produto da lista de produtos divulgados 
        $altera = "UPDATE produtoaceite SET Estado = 'Inactivo' WHERE Id_Produto = '$Id_Produto'";
        $recebe = mysqli_query($conect, $altera);

        // Colocar na tabela Produto pago
        $compra = "INSERT INTO produtoPago(Id_Usuario, Id_Produto) VALUES ('$Id_Usuario', '$Id_Produto')";
        $recebe = mysqli_query($conect, $compra);
            
        if($recebe){
            echo "Produto Comprado com sucesso. Va pegar ao nosso estabelecimento.";
            echo "<script> alert('O seu pedido encontra-se em validação. Será Notificado em breve!'); </script>";
            header("location: /NetCommerce/View/UserHome.php");
        }
        else
            echo "Erro ao comprar!".$recebe;
    
    }

    function Vender()
    {
        // Importing DBConfig.php file.
        include_once("conexao.php");

        $Id_Usuario = $_POST['Id_Usuario'];
        $name = $_POST['marca']." - ".$_POST['modelo'];
        $tipo = $_POST['tipo'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        // $tempo_uso = $_POST['tempo'];
        // $detalhes =  "Tempo de uso ".$tempo_uso." anos. \n".$descricao;

        $imagem = $_FILES['imagem']['name'];
        // $video = $_POST['video']['name'];

        // Creating SQL query and insert the record into MySQL database table.
        $Sql_Query = "INSERT INTO produto ( Id_Usuario, Nome, Tipo, Preco, Imagem, Video, Descricao) 
        VALUES ('$Id_Usuario', '$name','$tipo','$preco','$imagem', 'null','$descricao')";
        
        if(mysqli_query($conect, $Sql_Query)){

            $pegaIdProduto = "SELECT Proximo_Prod FROM config WHERE ID = 1";
            $result = mysqli_query($conect, $pegaIdProduto);
            $result = mysqli_fetch_assoc($result);

            $novoId = $result['Proximo_Prod'];

        // If the record inserted successfully then show the message.
        $MSG = "O produto foi registrado e aguarda aprovação. \n Leve ao estabelecimento NetCommerce para ser avaliado" ;

        $novo_nome = strtolower($_FILES['imagem']['name']);   
        
        if(mkdir("Files/$Id_Usuario/")){
            mkdir("Files/$Id_Usuario/$novoId/");
            move_uploaded_file($_FILES['imagem']['tmp_name'], "./Files/$Id_Usuario/$novoId/$novo_nome");
        }
        else{
            mkdir("Files/$Id_Usuario/$novoId/");
            move_uploaded_file($_FILES['imagem']['tmp_name'], "./Files/$Id_Usuario/$novoId/$novo_nome");            
        }

            
        echo $Id_Usuario;
        echo $novoId;

        
        $novoId = $novoId + 1;
        $novoP = "UPDATE config SET Proximo_Prod = $novoId  WHERE ID = 1";
        mysqli_query($conect, $novoP);
        echo "<script> alert('A sua venda encontra-se em validação. Por favor entregue o produto ao estabelecimento NetCommerce mais proximo!'); </script>";
        header("location: /NetCommerce/View/UserHome.php");
        
        }
        else{
        
        echo 'Try Again';
        
        }
    }
    
}

?>