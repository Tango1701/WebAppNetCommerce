<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/userHome.css">
    <title>NetCommerce</title>
</head>

<body>
    <div class="fundo">
        <div class="top">
            <h1 style="font-family: Segoe UI;" onclick="recarregar()">NetCommerce</h1>
            <div class="fotoPerfil">
                <h3 style="color: black; font-weight: 100;"><?php echo $_SESSION['Nome']; ?></h3>
                <img src="/NetCommerce/View/IMG/Mateus_Tango.jpg" >
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
                <img src="/NetCommerce/View/IMG/Home.png" alt="">
            </div>
            <div onclick="AbrePesquisa()">
                <img src="/NetCommerce/View/IMG/Search_white.png" alt="">
            </div>
            <div onclick="AbreFiltro()">
                <img src="/NetCommerce/View/IMG/Filter.png" alt="">
            </div>
            <div onclick="abreVenda()">
                <img src="/NetCommerce/View/IMG/Money.png" alt="">
            </div>
            <div onclick="abrePerfil()">
                <img src="/NetCommerce/View/IMG/User.png" >
            </div>
            <div>
                <img src="/NetCommerce/View/IMG/Settings 3_100px.png" alt="">
            </div>
            <div onclick="teminaSessao()">
                <img src="/NetCommerce/View/IMG/Shutdown_104px.png" alt="">
            </div>
        </div>
        <div class="corpo" id="corpo">
            <br> <br>
            <h2>Novidades</h2> <br>

            <!-- <div class="slider"></div> -->
            <div class="novidades" ></div> 
            <div class="categoria" ></div>
        </div>
        <div id="search">
            <div class="resultados"></div>
        </div>
        <div id="filter">
            <div class="outcome"></div>
        </div>
        <div id="perfil">
            <div class="info">
                <img src="/NetCommerce/View/IMG/Mateus_Tango.jpg">
                <h3 style="color: black;"><?php echo $_SESSION['Nome']; ?></h3>
                <h3 style="color: black;"><?php echo $_SESSION['Email']; ?></h3>
            </div> <br>
            <div class="vendasFeitas">
                <div id="VA"></div> <br>
                <div id="VP"></div>
                <div id="SS"></div>
                <div class="comprasFeitas"></div>
            </div>
            
        </div>

    </div>
    <div id="overlay" class="overlay">
        <div id="detalhesProduto" class="detalhesProduto">
            <label id="fechar" onclick="fechar()">X</label>
            <form id="detalhes"></form>
        </div>
        <div id="formasPagamento">
            <h3>Escolha a forma de pagamento</h3>
            <div class="formas">
                <div class="emis" onclick="PR()"><img src="/NetCommerce/View/IMG/pr.png">Pagamento por Referéncia </div>
                <div class="transf" onclick="TB()"><img src="/NetCommerce/View/IMG/tb.png">Transferência ou Depósito</div>
            </div> 
         
            <form class="pr" id="pr"  method="POST" action="/NetCommerce/index.php/compra">
                <h3>Pagamento por Referência</h3>
                <h4>Entidade - 15651285. </h4>
                <p>Efectue o pagamento nesta entidade e coloque abaixo o codigo gerado</p>
               
                <input type="text" id="prodPR" name="Id_Produto" hidden>
                <input type="text" id="user" name="Id_Usuario"  value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>   

                <input type="number" name="" id="" required>
                <input type="submit" value="Validar Pagamento">
            </form> 
            <form class="tb" id="tb" method="POST" action="/NetCommerce/index.php/compra">
                <h3>Transferência ou Depósito</h3>
                <p>Faça upload do compravativo de pagamento e clique em validar
                    (Formatos aceites são PDF e JPG)</p>
                
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
            <input type="number" name="preco" id="" placeholder="Preço Desejado" required>
            </div>

            <div>
            <img src="/NetCommerce/View/IMG/Picture.png" >
            <input type="file" name="imagem" id="" required>
            </div>
            <div>
            <img src="/NetCommerce/View/IMG/Video.png">
            <input type="file" name="video" id="" >
            </div>

            <input type="text" id="user" name="Id_Usuario"  value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>
            <textarea name="descricao" id="" cols="20" rows="50" placeholder="Descrição Detalhada do Produto" required></textarea> <br>
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
        overlay.style.display = "block"
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

    function filtrar (){

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
    
</script>

</html>