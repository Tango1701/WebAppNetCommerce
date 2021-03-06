<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/userHome.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <title>NetCommerce</title>
</head>

<body>
    <div class="fundo">
        <!-- <img src="/NetCommerce/View/IMG/ubuntu.jpg" id="fdimg"> -->
        <div class="top">
            <h1 style="font-family: Segoe UI;" onclick="recarregar()">NetCommerce</h1>
            <div class="fotoPerfil">
                <h3 style="color: black; font-weight: 100;"><?php echo $_SESSION['Nome']; ?></h3>
                <img src="/NetCommerce/Files/<?php echo $_SESSION['Id_Usuario']."/".$_SESSION['Foto']; ?>" >
            </div>
            <div class="pesquisa" id="pq">
                <input type="text" name="pesquisa" placeholder="pesquisar..." id="pesquisa" oninput="pesquisar()">
                <img src="/NetCommerce/View/IMG/Search_White.png" >
            </div>
            <div class="filtro" id="ft">
                <select name="" id="filterBoo" onchange="filtrar()"></select>
                <img src="/NetCommerce/View/IMG/Filter.png" >
            </div>
        </div>
        <div class="menuLateral">
            <div onclick="recarregar()">
                <div class="pic">
                    <img src="/NetCommerce/View/IMG/Home.png" >
                </div>
                <div class="d">
                    <label>Home</label>
                </div>
            </div>
            <div onclick="AbrePesquisa()">
                <div class="pic">
                    <img src="/NetCommerce/View/IMG/Search_white.png" alt="">
                </div>
                <div class="d">
                    <label>Pesquisar</label>
                </div>
                
            </div>
            <div onclick="AbreFiltro()">
                <div class="pic">
                <img src="/NetCommerce/View/IMG/Filter.png" alt="">
                </div>
                <div class="d">
                    <label>Filtrar</label>
                </div>
                
            </div>
            <div onclick="abreVenda()">
                <div class="pic">
                    <img src="/NetCommerce/View/IMG/Money.png" alt="">
                </div>
                <div class="d">
                    <label>Vender</label>
                </div>
                
            </div>
            <div onclick="abrePerfil()">
                <div class="pic">
                    <img src="/NetCommerce/View/IMG/User.png" >
                </div>
                <div class="d">
                    <label>Perfil</label>
                </div>
            </div>
            <div>
                <div class="pic">
                    <img src="/NetCommerce/View/IMG/Settings 3_100px.png" alt="">
                </div>
                <div class="d">
                    <label>Defini????es</label>
                </div>
            </div>
            <div onclick="teminaSessao()">
                <div class="pic">
                    <img src="/NetCommerce/View/IMG/Shutdown_104px.png" alt="">
                </div>
                <div class="d">
                    <label>Sair</label>
                </div>
            </div>
        </div>

        <!-- <div class="slider">
         <img src="/NetCommerce/Files/Banner/mercedes_shoes.jpg" alt=""> </div> -->

        <div class="corpo" id="corpo">
            
            <br> <br>
            <h2>Novidades</h2> <br>

            <div class="novidades" > </div> 
            <div class="categoria" ></div>
        </div>
        <div id="search"> <br> <br>
            <div class="resultados"></div>
        </div>
        <div id="filter"> <br> <br>
            <div class="outcome"></div>
        </div>
        <div id="perfil"> <br> <br>
            <div class="info">
                <img src="/NetCommerce/Files/<?php echo $_SESSION['Id_Usuario']."/".$_SESSION['Foto']; ?>"> 
                <h3 style="color: black;"><?php echo $_SESSION['Nome']; ?></h3> <br>
                <h3 style="color: black;"><?php echo $_SESSION['Email']; ?></h3>
            </div> <br> <br> <br>
            <h2>Compras e Vendas</h2> <br> <hr>

            <div class="vendasFeitas">
                <div id="VA"></div> <br>
                <div id="VP"></div>
                <div id="SS"></div>
                <div class="comprasFeitas"></div>
                <canvas id="myChart" ></canvas>

            </div>
            
        </div>

    </div>
    <div id="overlay" class="overlay">
        <div id="detalhesProduto" class="detalhesProduto">
            <label id="fechar" onclick="fechar()">X</label>
            <form id="detalhes"></form>
        </div>
        <div id="formasPagamento">
            <label id="fechar" onclick="fechar()">X</label>

            <h3>Escolha a forma de pagamento</h3>
            <div class="formas">
                <div class="emis" onclick="PR()"><img src="/NetCommerce/View/IMG/pr.png">Pagamento por Refer??ncia </div>
                <div class="transf" onclick="TB()"><img src="/NetCommerce/View/IMG/tb.png">Transfer??ncia ou Dep??sito</div>
            </div> 
         
            <form class="pr" id="pr"  method="POST" action="/NetCommerce/index.php/compra">
                <h3>Pagamento por Refer??ncia</h3>
                <h4>Entidade - 15651285. </h4>
                <p>Efectue o pagamento nesta entidade e coloque abaixo o codigo gerado</p>
               
                <input type="text" id="prodPR" name="Id_Produto" hidden>
                <input type="text" id="user" name="Id_Usuario"  value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>   

                <input type="number" name="" id="" required>
                <input type="submit" value="Validar Pagamento">
            </form> 
            <form class="tb" id="tb" method="POST" action="/NetCommerce/index.php/compra">
                <h3>Transfer??ncia ou Dep??sito</h3>
                <p>Fa??a upload do compravativo de pagamento e clique em validar
                    (Formatos aceites s??o PDF e JPG)</p>
                
                <input type="text" id="prodTB" name="Id_Produto" hidden>   
                <input type="text" id="user" name="Id_Usuario"  value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>   
               
                 <input type="file" name="" id="" required>
                <input type="submit" value="Validar Pagamento">
            </form>
        </div>

        <form action="/NetCommerce/index.php/vender" method="POST" class="FormVenda" id="FormVenda" enctype="multipart/form-data">
            <label id="fechar" onclick="fechar()">X</label>
                <h3>Efectuar uma Venda</h3>
            <div>   
                <img src="/NetCommerce/View/IMG/brand.png">
                <input type="text" name="marca" id="" placeholder="Marca" required>
            </div>
            <div>
                <img src="/NetCommerce/View/IMG/model.png" >
                <input type="text" name="modelo" id="" placeholder="Modelo" required>
            </div>
            <div>
                <img src="/NetCommerce/View/IMG/iphone.png" >
                <select name="tipo" id="" required>
                    <option value="Eletronico">Eletronico</option>
                    <option value="Eletrodomestico">Eletrodomestico</option>
                    <option value="Indumentaria">Indumentaria</option>
                    <option value="Viatura">Viatura</option>
                </select>
            </div>
            <div>
            <img src="/NetCommerce/View/IMG/preco.png" >
            <input type="number" name="preco" id="" placeholder="Pre??o Desejado" required>
            </div>

                <div>
                <img src="/NetCommerce/View/IMG/Picture.png" >
                <input type="file" name="imagem" id="" required>
                </div>
                <div>
                <img src="/NetCommerce/View/IMG/Picture.png">
                <input type="file" name="imagem2" id=""  >
                </div>
                <div>
                <img src="/NetCommerce/View/IMG/Picture.png" >
                <input type="file" name="imagem3" id="" >
                </div>
                <div>
                <img src="/NetCommerce/View/IMG/Picture.png">
                <input type="file" name="imagem4" id=""  >
            
            </div>
            

            <input type="text" id="user" name="Id_Usuario"  value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>
            <textarea name="descricao" id="" cols="20" rows="50" placeholder="Descri????o Detalhada do Produto" required></textarea> <br>
            <input type="submit" value="Efectuar Venda">

        </form>
    </div>



</body>



<script>
    var overlay = document.getElementById("overlay")
    var detalhesProduto = document.getElementById("detalhesProduto")
    var tb = document.getElementById("tb")
    var pr = document.getElementById("pr")
    var corpo = document.getElementById("corpo")
    var perfil = document.getElementById("perfil")
    var search = document.getElementById("search")
    var filter = document.getElementById("filter")
    var formaPagamento = document.getElementById("formasPagamento")
    var formVenda = document.getElementById("FormVenda") 
    var user = document.getElementById("user") 
    var pq = document.getElementById("pq")
    var ft = document.getElementById("ft")
    var slider = document.getElementById("slider")


    var TB = () => {
        pr.style.display = "none"
        tb.style.display = "flex"
        document.getElementById("prodTB").value = document.getElementById("idProd").value
    }

    var PR = () => {
        pr.style.display = "flex"
        tb.style.display = "none"
        document.getElementById("prodPR").value = document.getElementById("idProd").value
    }

    function fechar() {
        detalhesProduto.style.marginLeft = "25%"
        overlay.style.display = "none"
        detalhesProduto.style.display = "none"
        formaPagamento.style.display = "none"
        tb.style.display = "none"
        pr.style.display = "none"
        formVenda.style.display = "none"
    }

    window.onload = ( () => {

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/BuscaProdutos.php?user="+user.value;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $(".novidades").html(xmlhttp.response)
                categorias()
                // Banner()
            }
        }
    });
   
   
   
    function categorias(){
        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/BuscaCategoria.php?user="+user.value;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                // alert(xmlhttp.response)
                $(".categoria").html(xmlhttp.response)
            }
        }
    }

    function abrir(id) {
        overlay.style.display = "flex"
        detalhesProduto.style.display = "block"

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/BuscaDetalhesProduto.php?" +
            "Id_Produto=" + id;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                // alert(xmlhttp.response)
                $("#detalhes").html(xmlhttp.response)
            }
        }
    }

    var move = () => {
        formaPagamento.style.display = "flex"

        detalhesProduto.style.marginLeft = "10%"
        detalhesProduto.style.transition = "ease 0.7s"
    }

    recarregar = () => document.location.reload()

    function abreVenda ()
    {
        formVenda.style.display = "flex"
        overlay.style.display = "flex"
    }

    function abrePerfil() {

        corpo.style.display = "none"
        search.style.display = "none"
        filter.style.display = "none"
        perfil.style.display = "flex"

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/VendasUser.php?" +
            "user=" + user.value;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $("#VA").html(xmlhttp.response)
                VP(user.value)
            }
        }
        grafico()
    }

    function VP(user) {

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/VP.php?" +
            "user=" + user;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $("#VP").html(xmlhttp.response)
                SS(user)
            }
        }
    }

    function SS(user) {

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/SucessfulSells.php?" +
            "user=" + user;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $("#SS").html(xmlhttp.response)
                ComprasFeitas(user)
            }
        }
    }
     
    function ComprasFeitas(user) {

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/ComprasUser.php?" +
            "user=" + user;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $(".comprasFeitas").html(xmlhttp.response)
            }
        }
    }

    function teminaSessao(){
        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/index.php/logoff";
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                document.location.pathname = "/NetCommerce/index.php"
            }
        }
    }


    function pesquisar(){

        var valor = document.getElementById("pesquisa").value

        filter.style.display = "none"
        perfil.style.display = "none"
        corpo.style.display = "none"
        search.style.display = "flex"

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/Pesquisar.php?" +
            "valor=" + valor;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $(".resultados").html(xmlhttp.response)
            }
        }
    }

    var AbrePesquisa = () => {
        pq.style.display = "flex"
        ft.style.display = "none"
    }

    var AbreFiltro = () => {
        ft.style.display = "flex"
        pq.style.display = "none"

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/buscaFiltros.php?";
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $("#filterBoo").html(xmlhttp.response)
            }
        }
    }

    function filtrar ()
    {

        perfil.style.display = "none"
        corpo.style.display = "none"
        search.style.display = "none"
        ft.style.display = "flex"
        filter.style.display = "flex"
        
        var selecionado = document.getElementById("filterBoo")

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/Filtrar.php?user="+user.value +"&categoria="+selecionado.value;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                $(".outcome").html(xmlhttp.response)
            }
        }
    }
    
    var xValues = ["Vendas Pendentes", "Vendas Aprovadas", "Vendas Bem Sucedidas", "Vendas Rejeitadas"];
        // var yValues = [55, 49, 1, 24];

        var barColors = ["yellow", "dodgerblue","green","rgb(150, 0, 0)"];
        var _VBS = 0
        var _VA = 0
        var _VendaP = 0
    
    function grafico(){

        var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/VBS.php?user="+user.value;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
                _VBS = xmlhttp.response
                VA()
            }
        }

        function VA(){
            var xmlhttp = new XMLHttpRequest();

            let url = "/NetCommerce/Model/VA.php?user="+user.value;
            xmlhttp.open('GET', url, true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = () => {
                if (xmlhttp.readyState == 4) // Return Request
                {
                    _VA = xmlhttp.response
                    VendaP()
                }
            }
        }

        function VendaP(){
            var xmlhttp = new XMLHttpRequest();

            let url = "/NetCommerce/Model/VendaP.php?user="+user.value;
            xmlhttp.open('GET', url, true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = () => {
                if (xmlhttp.readyState == 4) // Return Request
                {
                    _VendaP = xmlhttp.response
                    g()
                }
            }
        }
        
        }

        function g (){

            var yValues = [_VendaP,_VA, _VBS, 1];

            var myChart = new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Minhas Vendas"
            }
        }
        });
        }
</script>

</html>