<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/NetCommerce/View/css/home.css">
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="JS/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="JS/bootstrap-5.0.0-beta1-dist/css/bootstrap-utilities.css" />
    <link rel="stylesheet" href="JS/fontawesome-free-5.15.1-web/css/all.css" />
    <script src="JS/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"></script>
    <script src="JS/chart.js/Chart.min.js"></script>

    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <title>NetCommerce</title>
</head>

<body>

    <div class="fundo">

        <img src="/NetCommerce/View/IMG/pc_tablet.jpg">
        <div class="i">

        </div>
        <form class="menutop" action="/NetCommerce/index.php/logoff" method="POST">
            <h1>NetCommerce </h1>

            <div class="logo" id="logo">
                <!-- <img src="/NetCommerce/View/IMG/menu black.png"> -->
            </div>
            <div class="info">
                <?php
                session_start();

                $conect = mysqli_connect("localhost", "root", "", "netcommerce");
                $query = "SELECT * From funcionario WHERE Id_Funcionario = '" . $_SESSION['Usuario'] . "';";
                $resultado = mysqli_query($conect, $query);
                $linha = mysqli_fetch_assoc($resultado);

                echo "<label>" . $_SESSION['Nome'] . "</label>";
                echo "<label>ID:</label> <br>";
                echo "<label>" . $linha['Id_Funcionario'] . "</label>";
                ?>
            </div>
        </form>

        <div class="overlay"></div>


        <div class="cardapio">


            <!-- Tab Container -->
            <div class="tabC">
                <div class="funcoes">


                    <div class="funcoes">
                        <div class="cabeca">
                            <h1>Novas Usuarios</h1> <br>

                            <!-- Buscar os produtos venda  -->
                            <?php
                            $conect = mysqli_connect("localhost", "root", "", "netcommerce");
                            $query = "SELECT * FROM usuario_pendente";
                            $resultado = mysqli_query($conect, $query);

                            echo "<table id='customers'>";
                            echo "<tr>
                                    <th>Fotografia</th>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Documentos</th>
                                    <th>Acao</th>
                                </tr>";

                            while ($linha = mysqli_fetch_assoc($resultado)) {

                                $query1 = "SELECT * FROM dadosbancarios WHERE Id_Usuario = '" . $linha['Id_Usuario'] . "'";
                                $result = mysqli_query($conect, $query1);
                                $dadosBancario = mysqli_fetch_assoc($result);

                                echo " <tr>";
                                echo "<td><img src='http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/" .
                                    $linha['Foto'] . "'> </td>";
                                echo "<td>" . $linha['Id_Usuario'] . "</td> <br>";
                                echo "<td>" . $linha['Nome'] . "</td> ";
                                echo "<td>" . $linha['Email'] . "</td> ";
                                echo "<td> 
                                <a href='http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/Doc/" . $dadosBancario['Doc_BI'] . "'>" . $dadosBancario['Doc_BI'] . "</a>";
                                echo "<br><a href='http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/Doc/" . $dadosBancario['Doc_Conta'] . "'>" . $dadosBancario['Doc_Conta'] . "</a>";
                                echo "</td> ";
                                echo "<input name='docBI' id='biUser' value='" . $dadosBancario['Doc_BI'] . "' hidden> <br>";
                                echo "<input name='docCBI' id='biCaminhoUser' value='http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/Doc/' hidden> <br>";
                                echo "<input name='docConta' id='contaUser' value='" . $dadosBancario['Doc_Conta'] . "' hidden> <br>";
                                echo "<input name='docCConta' id='contaCaminhoUser' value='http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/Doc/' hidden> <br>";
                                echo "<input name='Nome' id='nomeUser' value=" . $linha['Nome'] . " hidden> <br>";
                                echo "<input name='Id_Produto' id='idUser' value=" . $linha['Id_Usuario'] . " hidden> <br>";
                                echo "<input name='Email' id='emailUser' value=" . $linha['Email'] . " hidden> <br>";
                                echo "<td><div class='btnAprovacaoContainer'> ";
                                echo "<Button onclick='AprovaUser()' class='btnAprovacao'>Aprovar</Button>";
                                echo "<Button class='btnRejeicao'>Rejeitar</Button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";

                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="funcoes">
                        <div class="cabeca">
                            <h1>Novas Vendas</h1> <br>

                            <h5>Aprove para serem publicados</h5> <br>


                            <!-- Buscar os produtos venda  -->
                            <?php
                            $conect = mysqli_connect("localhost", "root", "", "netcommerce");
                            $query = "SELECT * FROM produto";
                            $resultado = mysqli_query($conect, $query);


                            while ($linha = mysqli_fetch_assoc($resultado)) {

                                echo " <form class='pedido' action='/NetCommerce/index.php/aprovarProduto' method='POST'>";
                                echo "<div class='imgItem'> ";
                                echo "<img 
                                src='http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/" . $linha['Id_Produto'] . "/" . $linha['Imagem'] . "'>";
                                echo "</div> ";
                                echo "<div class='itemDetalhes'> ";
                                echo "<h5>" . $linha['Nome'] . "</h5> ";
                                echo "<label>Usuario:</label> ";
                                echo "<label>" . $linha['Id_Usuario'] . "</label> <br>";
                                echo "<input name='Id_Produto' value=" . $linha['Id_Produto'] . " hidden> <br>";
                                echo "<label>Tipo:</label> ";
                                echo "<label>" . $linha['Tipo'] . "</label> <br>";
                                echo "<label>Descrição:</label> ";
                                echo "<label>" . $linha['Descricao'] . "</label>";
                                echo "http://localhost/NetCommerce/Files/" . $linha['Id_Usuario'] . "/" . $linha['Id_Produto'] . "/" . $linha['Imagem'];

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

            </div>
        </div>


       



</body>


<script>

    var objDados = {
        nome: "",
        email: "",
        senha: "",
        conta: "",
        bi: "",
        biCaminho: "",
        conta: "",
        contaCaminho: "",
    }

    var AprovaUser = () => {

        var user = document.getElementById("idUser").value
        var email = document.getElementById("emailUser").value
        var nome = document.getElementById("nomeUser").value
        var bi = document.getElementById("biUser").value
        var biCaminho = document.getElementById("biCaminhoUser").value
        var conta = document.getElementById("contaUser").value
        var contaCaminho = document.getElementById("contaCaminhoUser").value
        
        objDados.email = email
        objDados.nome = nome
        objDados.bi = bi
        objDados.conta = conta
        objDados.contaCaminho = contaCaminho
        objDados.biCaminho = biCaminho

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/AprovaUser.php?" + "user=" + user;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                console.log(xmlhttp.response)
                if(xmlhttp.response != "Deu pau"){
                    objDados.senha = xmlhttp.response
                    sendEmail()
                }

            }
        }
    }

    function sendEmail() {
        console.log(objDados)
      Email.send({
        Host: "smtp.gmail.com",
        Username: "netcommercelda@gmail.com",
        Password: "M@tt1701",
        To: objDados.email,
        From: "netcommercelda@gmail.com",
        Subject: "Dados da Conta",
        Body: "Ola "+objDados.nome+" \n Estes são os dados da tua conta. Senha = "+objDados.senha,
        Attachments: [
          {
            name: objDados.bi,
            path: objDados.biCaminho
          },
          {
            name: objDados.conta,
            path: objDados.contaCaminho
          }
        ]
      })
        .then(function (message) {
          alert(message)
          document.location.reload()
        });
    }



</script>


</html>