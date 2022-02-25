<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/NetCommerce/View/css/home.css">
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <title>NetCommerce</title>
</head>
<body>

    <div class="fundo">

        <img src="/NetCommerce/View/IMG/mulhernegra.jpg">
        <div class="i">
           
        </div>
        <form class="menutop"action="/NetCommerce/index.php/logoff" method="POST" >
        <h1>NetCommerce </h1>

            <div class="logo" id="logo">
                <img src="/NetCommerce/View/IMG/menu black.png">
            </div>
            <div class="info">
                <?php
                    session_start();
                    
                    $conect = mysqli_connect("localhost","root","","netcommerce");
                    $query = "SELECT * From funcionario WHERE Id_Funcionario = '".$_SESSION['Usuario']."';";
                    $resultado = mysqli_query($conect,$query);
                    $linha = mysqli_fetch_assoc($resultado);
                    
                    echo "<label>".$_SESSION['Nome']."</label>";
                    echo "<label>ID:</label> <br>";
                    echo "<label>".$linha['Id_Funcionario']."</label>";
                ?>
            </div>
        </form>

        <div class="overlay"></div>
       


       
        <div class="cardapio">
            <div class="cabeca">
            <h1>Novas Vendas</h1>  <br>

            <h5>Aprove para serem publicados</h5> <br>


            <!-- Buscar os produtos venda  -->
            <?php                    
                    $conect = mysqli_connect("localhost","root","","netcommerce");
                    $query = "SELECT * FROM produto";
                    $resultado = mysqli_query($conect,$query);
                    

                   while($linha = mysqli_fetch_assoc($resultado)){
           
                    echo " <form class='pedido' action='/NetCommerce/index.php/aprovarProduto' method='POST'>";
                        echo "<div class='imgItem'> ";
                            echo "<img 
                                src='http://localhost/NetCommerce/files/".$linha['Id_Usuario']."/".$linha['Id_Produto']."/".$linha['Imagem']."'>";
                        echo "</div> ";
                        echo "<div class='itemDetalhes'> ";
                            echo "<h5>".$linha['Nome']."</h5> ";
                            echo "<label>Usuario:</label> ";
                            echo "<label>".$linha['Id_Usuario']."</label> <br>";
                            echo "<input name='Id_Produto' value=".$linha['Id_Produto']." hidden> <br>";
                            echo "<label>Tipo:</label> ";
                            echo "<label>".$linha['Tipo']."</label> <br>";
                            echo "<label>Descrição:</label> ";
                            echo "<label>".$linha['Descricao']."</label>";
                        echo "</div> ";
                        echo "<div class='btnAprovacaoContainer'> ";
                            echo "<Button type='submit' class='btnAprovacao'>Aprovar</Button>";
                            echo "<Button class='btnRejeicao'>Rejeitar</Button>";
                        echo "</div>";
                    echo "</form>";
                    echo "<hr>";

                   }

                ?>
            </div>
        </div>
    </div>
    

    <script>
        
        var lbl = document.getElementById("lbl");
        var tabela = document.getElementById("tabela");
        var mlx = document.getElementById("mlX");
        var logo = document.getElementById("logo");
        
        function mostra(i)
        {
            var a = document.getElementById("txt"+i).value;
            document.getElementById("peidos").style.display = "block";
            document.getElementById("txtPedido").value = a;

            var id = document.getElementById('txtPedido').value;
            $.ajax({
                type: 'POST',  
                url: '/Projectos/SchoolGest/index.php/vp',
                data: 'id=' + id,
                success: function(){}
            }); 
        }

        lbl.onclick = function(){
            document.getElementById("peidos").style.display = "none";
        };
        mlx.onclick = function(){
            document.getElementById("menuLateral").style.display = "none";
        };
        logo.onclick = function(){
            document.getElementById("menuLateral").style.display = "block";
        };

        function calcula(){
        
            var preco = document.getElementById("preco").value;
            var qtd = document.getElementById("qtd").value;
            var total = document.getElementById("total");

            total.value = qtd * preco;
        };

    </script>



</body>
</html>