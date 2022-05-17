<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script type="text/javascript" src="./js/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/Dash.css" />
  <script type="text/javascript" src="./js/jquery.min.js"></script>
  <script type="text/javascript" src="./js/Dash.js"></script>
  <link rel="stylesheet" href="JS/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="JS/bootstrap-5.0.0-beta1-dist/css/bootstrap-utilities.css" />
  <link rel="stylesheet" href="JS/fontawesome-free-5.15.1-web/css/all.css" />
  <script src="JS/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"></script>
  <!-- <script src="JS/bootstrap-5.0.0-beta1"></script> -->

  <title>NetCommerce</title>
</head>

<body onload="mostraPainel(0, 'rgb(21, 146, 230)')">
  <div class="fundo">
    <div class="painelEsquerda">
      <div class="esquerdaTop" onclick="recarregar()">
        <h1 style="color: rgb(21, 146, 230)" >LOGO</h1>
      </div>
      <div class="esquerdaMid">
        <ul class="menu">
          <li onclick="recarregar()"><i class="fa fa-home"></i>Home</li>
          <li><i class="fa fa-money-bill-wave"></i>vender</li>
          <li><i class="fa fa-gift"></i>Comprar</li>
          <li><i class="fa fa-wallet"></i>Carteira</li>
          <li><i class="fa fa-cart-plus"></i>Carrinho</li>
          <li><i class="fa fa-heart"></i>Gostos</li>
          <li><i class="fa fa-user"></i>Perfil</li>
          <li><i class="fa fa-history"></i>Histórico</li>
          <li><i class="fa fa-tools"></i>Configurações</li>
          <li><i class="fa fa-warehouse"></i>Armazéns</li>
          <li><i class="fa fa-info"></i>Informações</li>
          <li><i class="fa fa-star"></i>Nos Avalie</li>
        </ul>
      </div>
      <div class="esquerdaLow">
        <button title="Sair"  onclick="teminaSessao()" class="btn-danger fa fa-power-off">
          Terminar Sessão
        </button>

      </div>
    </div>
    <div class="painelCentral">
      <div class="painelTop">
        <!-- Tab menu -->
        <div class="buttonContainer">
          <button class="button" onclick="mostraPainel(0, 'rgb(21, 146, 230)')">
            <i class="fa fa-photo-video i"></i>
          </button>
          <button class="button" onclick="mostraPainel(1, 'rgb(21, 146, 230)')">
            <i class="fa fa-search i"></i>
          </button>
          <button class="button" onclick="mostraPainel(2, 'rgb(21, 146, 230)')">
            <i class="fa fa-filter i"></i>
          </button>
        </div>

        <!-- Tab Container -->
        <div class="tabC">
          <div class="funcoes" id="stories">
            <!-- Stories -->
            <div class="storyContainer">
              <div>
                <div class="storyBubble" onclick="abreStory()">
                  <img src="../View/IMG/1.png" alt="" />
                </div>
                <label>Calçados</label>
              </div>
              <div>
                <div class="storyBubble">
                  <img src="../View/IMG/Macbook-Air.jpg" alt="" />
                </div>
                <label>Eletrónicos</label>
              </div>
              <div>
                <div class="storyBubble">
                  <img src="../View/IMG/Mercedes_Car.jpg" alt="" />
                </div>
                <label>Viaturas</label>
              </div>
            </div>
          </div>

          <div class="funcoes">
            <div class="pesquisa">
              <div class="barraPesquisa">
                <i class="fa fa-search" style="color: rgb(21, 146, 230)"></i>
                <input type="search" placeholder="Pesquisar" id="pesquisa" oninput="pesquisar()" autocomplete="off" />
              </div>
            </div>
          </div>
          <div class="funcoes">
            <div class="filtro">
              <div class="barraFiltragem">
                <i class="fa fa-filter" style="color: rgb(21, 146, 230)"></i>
                <!-- <label>Filtrar por </label> -->
                <select name="" id="filterBoo" onchange="filtrar()"></select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Paindel de Baixo no Painel Centarl -->
      <div class="painelBaixo" id="painelBaixo">


        <!-- Stories Abrem aqui -->
        <div id="story">
          <div class="barraOpcoes">
            <div class="fechar">
              <i class="fa fa-arrow-left"></i>
              <label>Voltar</label>
            </div>
            <div class="barraProgresso">
              <div class="barraProgressoVazia">
                <div class="barraProgressoCheia" id="barraProgressoCheia"></div>
              </div>
            </div>
            <div class="opcoes">
              <i title="Gosto" class="fa fa-heart" style="font-size: 20px" onclick="colocarGosto()"></i>
              <i title="Detalhes" class="fa fa-clipboard-list" style="font-size: 20px"></i>
              <i title="Add Carrinho" class="fa fa-cart-plus" style="font-size: 20px"></i>
            </div>
          </div>
          <img id="pic" />
        </div>

        <!-- Conteúdo a ser apresentado -->
        <div class="categoria"></div>

        <!-- Resultado do Filtro -->
        <div id="resultadoFiltro"></div>

        <!-- Resultado da Pesquisa -->
        <div id="resultadoPesquisa"></div>


      </div>
    </div>

    <!-- Painel da direita -->
    <div class="painelDireita">
      <div class="direitaTop">
        <div class="modeSwitch">
          <div class="swicth"></div>
        </div>
        <div class="kumbuCarteira">
          <h6>14.470.00 AOA</h6>
        </div>
        <div class="fotoPerfil">
          <img src="./IMG/Mateus_Tango.jpg">
        </div>
        <input type="text" id="user" name="Id_Usuario" value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>

      </div>

      <div id="diretaMid">
        <div id="detalhes"></div>
      </div>
    </div>
    
  </div>
</body>

<!-- Script que controla os Stories -->
<script>
  // Função para abrir e fechar os stories
  var abreStory = () => {

    LimpaTudo()

    var pic = document.getElementById("pic");

    var imagens = ["./IMG/blue_shoes.jpg", "./IMG/Mercedes_Shoes.jpg"];

    let story = document.getElementById("story");
    var progressbar = document.getElementById("barraProgressoCheia");
    var index = 0;

    story.style.display = "block";
    pic.setAttribute("src", imagens[index]);


    let meta = 5;
    let progresso = 0;

    let intervalID = setInterval(() => {

      progresso++;

      progressbar.style.width = progresso * 20 + "%";
      progressbar.style.transition = "1s ease";

      if (progresso == meta) {

        index++;
        pic.setAttribute("src", imagens[index]);
        console.log(imagens[index]);

        progressbar.style.width = "0%";
        progresso = 0;
      }

      if (index == imagens.length) {
        story.style.display = "none";
        clearInterval(intervalID);
        progressbar.style.width = "0%";
      }
    }, 1000);

    categorias()
    // var para = () => clearInterval(intervalID)
  };
</script>

<!-- Busca Produtos por categoria -->
<script>
  var user = document.getElementById("user")

  window.onload = (() => {

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/BuscaProdutos.php?user=" + user.value;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4) // Return Request
      {
        // $(".novidades").html(xmlhttp.response)
        categorias()
        // Banner()
      }
    }
  });



  function categorias() {
    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/BuscaCategoria.php?user=" + user.value;
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
</script>

<!-- Script que abre o painel de visualização do item -->
<script>
  
  var detalhesProduto = document.getElementById("diretaMid")


  function abrir(id) {

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
</script>

<!-- Script para fazer filtragem de conteúdo -->
<script>
  
  var filter = document.getElementById("filter")
  var resultadoFiltro = document.getElementById("resultadoFiltro")

  function filtrar (){

    LimpaTudo()

    var selecionado = document.getElementById("filterBoo")

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/Filtrar.php?user=" + user.value +"&categoria=" + selecionado.value;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) // Return Request
        {
          $("#resultadoFiltro").html(xmlhttp.response)
        }
      }

      resultadoFiltro.style.display = "flex"
  }

  function LimpaTudo(){
  
    const tudo = document.getElementById("painelBaixo").children;

    for (let index = 0; index < tudo.length; index++) {
        const element = tudo[index];
        element.style.display = "none";
      }
          
    
  }

  var AbreFiltro = () => {

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

</script>

<!-- Recarregar a página -->
<script>
   var recarregar = () => document.location.reload()
</script>

<!-- Pesquisar -->
<script>

  function pesquisar(){

    const resultadoPesquisa = document.getElementById("resultadoPesquisa")
    
    LimpaTudo()

    var valor = document.getElementById("pesquisa").value

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/Pesquisar.php?user=" + user.value + "&valor=" + valor;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) // Return Request
        {
            $("#resultadoPesquisa").html(xmlhttp.response)
        }
    }

    resultadoPesquisa.style.display = "flex"

  }


</script>

<!-- Terminar Sessão -->
<script>
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

</script>

<!-- Coloca Gosto -->
<script>

  function colocarGosto(){

    const idProd = document.getElementById("idProd").value
    var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/Gosto.php?Id_Usuario="+user.value+"&Id_Produto="+idProd;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
				alert("Gosto")

            }
        }
    }

</script>

<!-- Add artigo ao carrinho -->
<script>

  function addCarrinho(){

    const idProd = document.getElementById("idProd").value
    var xmlhttp = new XMLHttpRequest();

        let url = "/NetCommerce/Model/Carrinho.php?Id_Usuario="+user.value+"&Id_Produto="+idProd;
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if (xmlhttp.readyState == 4) // Return Request
            {
				alert(xmlhttp.responseText)
            }
        }
    }

</script>

</html>