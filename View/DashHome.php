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
  <script src="JS/chart.js/Chart.min.js"></script>

  
  


  <title>NetCommerce</title>
</head>

<body onload="mostraPainel(0, 'rgb(21, 146, 230)')">
  <div class="fundo">
    <div class="painelEsquerda">
      <div class="esquerdaTop">
        <h1 style="color: rgb(21, 146, 230)" onclick="recarregar()">LOGO</h1>
          <div class="btnMenu" onclick="btnMenuTroca(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </div>
      <div class="esquerdaMid">
        <ul class="menu">
          <li onclick="recarregar()"><i class="fa fa-home"></i><label>Home</label></li>
          <li><i class="fa fa-money-bill-wave"></i> <label>Vender</label> </li>
          <!-- <li><i class="fa fa-gift"></i><label>Comprar</label></li> -->
          <li><i class="fa fa-wallet"></i><label>Carteira</label></li>
          <li><i class="fa fa-cart-plus"></i><label>Carrinho</label></li>
          <li><i class="fa fa-heart"></i><label>Gostos</label></li>
          <li><i class="fa fa-user"></i><label>Perfil</label></li>
          <li><i class="fa fa-history"></i><label>Histórico</label></li>
          <li><i class="fa fa-tools"></i><label>Configurações</label></li>
          <li><i class="fa fa-warehouse"></i><label>Armazéns</label></li>
          <li><i class="fa fa-info"></i><label>Informações</label></li>
          <li><i class="fa fa-star"></i><label>Nos Avalie</label></li>
        </ul>
      </div>
      <div class="esquerdaLow">
        <button title="Sair" onclick="teminaSessao()" class="btn-danger fa fa-power-off">
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

      <div id="formularioVenda">
        <!-- Formulário de Vendas  -->
        <!-- <form action="/NetCommerce/index.php/vender" method="POST" class="FormVenda" id="FormVenda" enctype="multipart/form-data">
          <h3> Vender</h3>
          <div id="painelVenda">

            <div>
              <input type="text" name="marca" id="" placeholder="Marca" required>
              <input type="text" name="modelo" id="" placeholder="Modelo" required>
            </div>
            <div>
              <select name="tipo" id="" required>
                <option value="Eletronico">Eletronico</option>
                <option value="Eletrodomestico">Eletrodomestico</option>
                <option value="Indumentaria">Indumentaria</option>
                <option value="Viatura">Viatura</option>
              </select>
              <input type="number" name="preco" id="" placeholder="Preço Desejado" required>
            </div>
              <br> 
           
            <div id="di">
              <div id="divIMG">
                <img src="" id="IMG1">
                <input type="file" name="imagem" id="I1" required>
              </div>

              <div id="divIMG">
                <img src="">
                <input type="file" name="imagem1" id="" >
              </div>

              <div id="divIMG">
                <img src="">
                <input type="file" name="imagem2" id="" >
              </div>

              <div id="divIMG">
                <img src="">
                <input type="file" name="imagem3" id="" >
              </div>

            </div>
            
              <br> 

            <div>
              <textarea name="descricao" id="descricao" cols="20" rows="50" placeholder="Descrição Detalhada do Produto" required></textarea> <br>
            </div>

            <input type="text" id="user" name="Id_Usuario" value="<?php echo $_SESSION['Id_Usuario'] ?>" hidden>

          </div>

          <input type="submit" value="Efectuar Venda">

        </form> -->

        <form action="/NetCommerce/index.php/vender" method="POST" id="FormVenda" enctype="multipart/form-data">
          <div class="container">
            <br> <br> <br> <br> <br>
            <h1>Vender</h1>
            <!-- <p>Por favor preencha todos os campos.</p> -->
            <hr>

            <label for="email"><b>Marca</b></label>
            <input type="text" name="marca" id="" placeholder="Marca" required>
            <label for="psw"><b>Modelo</b></label>
            <input type="text" name="modelo" id="" placeholder="Modelo" required>
            <label for="psw"><b>Preço</b></label>
            <input type="number" name="preco" id="" placeholder="Preço Desejado" required>

            <label for="psw"><b>Categoria</b></label>
            <select name="tipo" id="" required>
              <option value="Eletronico">Eletronico</option>
              <option value="Eletrodomestico">Eletrodomestico</option>
              <option value="Indumentaria">Indumentaria</option>
              <option value="Viatura">Viatura</option>
            </select> <br> <br>

            <label for="psw"><b>Fotografia</b></label>
            <input type="file" name="imagem" id="I1" required>


            <label for="psw"><b>Descrição</b></label>
            <textarea name="descricao" id="descricao" cols="20" rows="50" placeholder="Descrição Detalhada do Produto" required></textarea> <br>


            <div class="clearfix">
              <button type="submit" class="signupbtn">Vender</button>
            </div>
          </div>
        </form>



      </div>

      <div id="Carrinho">

      </div>

      <div id="Perfil"> <br> <br>
        <div class="info">
          <img src="/NetCommerce/Files/<?php echo $_SESSION['Id_Usuario'] . "/" . $_SESSION['Foto']; ?>">
          <h5 style="color: black;"><?php echo $_SESSION['Nome']; ?></h5> <br>
          <h5 style="color: black;"><?php echo $_SESSION['Email']; ?></h5>
        </div>





        <div class="vendasFeitas">
          <div id="VA"></div> <br>
          <div id="VP"></div>
          <div id="SS"></div>
          <div class="comprasFeitas"></div>
          <canvas id="myChart"></canvas>

        </div>

      </div>

      <div id="Gostos">

      </div>

      <div id="Carteira"></div>

    </div>

    <!-- Painel da direita -->
    <div class="painelDireita">
      <div class="direitaTop">
        <div class="modeSwitch">

          <!-- Rounded switch -->
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>

        </div>
        <div class="kumbuCarteira" id="kumbuCarteira">
          <h6>14.000 AOA</h6>
        </div>
        <div class="fotoPerfil">
          <img src="<?php echo "/NetCommerce/Files/" . $_SESSION['Id_Usuario'] . "/" . $_SESSION["Foto"] ?>">
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


    kumbu()

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

  function filtrar() {

    LimpaTudo()

    var selecionado = document.getElementById("filterBoo")

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/Filtrar.php?user=" + user.value + "&categoria=" + selecionado.value;
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

  function LimpaTudo() {

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
  function pesquisar() {

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
  function teminaSessao() {
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
  function colocarGosto() {

    const idProd = document.getElementById("idProd").value
    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/Gosto.php?Id_Usuario=" + user.value + "&Id_Produto=" + idProd;
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
  function addCarrinho() {

    const idProd = document.getElementById("idProd").value
    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/Carrinho.php?Id_Usuario=" + user.value + "&Id_Produto=" + idProd;
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

<!-- Buscar o carrinho -->
<script>
  function pegaCarrinho() {

    const Carrinho = document.getElementById("Carrinho")

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/BuscaCarrinho.php?user=" + user.value;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4) // Return Request
      {
        $("#Carrinho").html(xmlhttp.response)
      }
    }

    Carrinho.style.display = "flex"

  }
</script>

<!-- Perfil -->
<script>
  function carregaPerfil() {

    const Perfil = document.getElementById("Perfil")
    Perfil.style.display = "flex"

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
    // grafico()
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
</script>
<!-- Eventos do Menu -->
<script>
  const listaMenu = document.querySelectorAll(".painelEsquerda .esquerdaMid .menu li")

  listaMenu[1].onclick = () => {

    // mudaCores(1)

    const tudo = document.querySelector(".painelCentral").children;

    for (let index = 0; index < tudo.length; index++) {
      const element = tudo[index];
      element.style.display = "none";
    }

    document.getElementById("formularioVenda").style.display = "flex"
  }

  listaMenu[3].onclick = () => {

    const tudo = document.querySelector(".painelCentral").children;

    for (let index = 0; index < tudo.length; index++) {
      const element = tudo[index];
      element.style.display = "none";
    }

    document.getElementById("Carrinho").style.display = "flex"
    pegaCarrinho()
  }

  listaMenu[5].onclick = () => {

    const tudo = document.querySelector(".painelCentral").children;

    for (let index = 0; index < tudo.length; index++) {
      const element = tudo[index];
      element.style.display = "none";
    }
    console.log(tudo)

    document.getElementById("Perfil").style.display = "flex"
    carregaPerfil()
  }

  listaMenu[4].onclick = () => {

    LimpaPainelCentral()

    document.getElementById("Gostos").style.display = "flex"

    carregaGostos()
  }
  listaMenu[2].onclick = () => {

    LimpaPainelCentral()
    kumbu()
    Dinheiro()
  }

  var mudaCores = (index) => {
    listaMenu.forEach(li => {
      li.style.color = "white"
    });

    listaMenu[index].style.color = "rgb(21, 146, 230)"
  }

  var LimpaPainelCentral = () => {
    const tudo = document.querySelector(".painelCentral").children;

    for (let index = 0; index < tudo.length; index++) {
      const element = tudo[index];
      element.style.display = "none";
    }
    console.log(tudo)
  }
</script>

<!-- Carrega Gostos -->
<script>
  function carregaGostos() {

    const Gostos = document.getElementById("Gostos")
    Gostos.style.display = "flex"

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/BuscaGostos.php?" +
      "user=" + user.value;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4) // Return Request
      {
        $("#Gostos").html(xmlhttp.response)
      }
    }
    // grafico()
  }
</script>


<!-- Carrega montante disponível da carteira -->
<script>
  var kumbu = () => {

    const kumbuCarteira = document.getElementById("kumbuCarteira")
    kumbuCarteira.style.display = "flex"

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/BuscaCarteira.php?" + "user=" + user.value;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4) // Return Request
      {
        $("#kumbuCarteira").html(xmlhttp.response)
      }
    }

  }

  var Dinheiro = () => {

    const Carteira = document.getElementById("Carteira")
    Carteira.style.display = "flex"

    var xmlhttp = new XMLHttpRequest();

    let url = "/NetCommerce/Model/BuscaCarteira.php?" + "user=" + user.value;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4) // Return Request
      {
        $("#Carteira").html(xmlhttp.response)
      }
    }
  }
</script>

<!-- Script para alterar entre dark and light mode -->
<script>
  document.querySelector(".switch").onclick = () => {
    const input = document.querySelector(".switch input")

    if (input.checked) {

      // Modo claro

      document.querySelector(".fundo").style.backgroundColor = "rgb(226, 226, 226)"

      // ================================================================================ //

      // Painel Central
      document.querySelector(".painelCentral").style.backgroundColor = "white"
      document.querySelector(".painelCentral").style.borderWidth = "1px"
      document.querySelector(".painelCentral").style.borderStyle = "solid"
      document.querySelector(".painelCentral").style.borderColor = "rgb(21, 146, 230)"

      // ================================================================================ //

      document.querySelector(".buttonContainer").style.backgroundColor = "rgb(88, 88, 88)"
      // document.querySelector(".tabC").style.backgroundColor = "rgb(184, 184, 184)"

      document.querySelector(".painelDireita").style.backgroundColor = "white"
      document.querySelector(".painelDireita").style.color = "rgb(88, 88, 88)"


      document.querySelector(".painelBaixo").style.backgroundColor = "white"
      document.querySelector(".tabC").style.borderTopLeftRadius = "0"
      document.querySelector(".tabC").style.borderBottomLeftRadius = "0"


      // var li = document.querySelectorAll(".painelEsquerda .menu li")
      // li.forEach(element => {
      //   element.style.backgroundColor = " rgb(255, 255, 255)"
      //   element.style.color = "rgb(80, 80, 80)"

      //   element.querySelectorAll("i").forEach(i => {
      //     i.style.color = "rgb(88, 88, 88)"
      //   });

      // });


    } else {

      // Modo escuro
      document.querySelector(".fundo").style.backgroundColor = "rgb(30, 30, 30)"

      document.querySelector(".painelCentral").style.backgroundColor = "rgb(30, 30, 30)"
      document.querySelector(".painelCentral").style.border = "none"

      document.querySelector(".painelBaixo").style.backgroundColor = "rgb(88, 88, 88)"
      document.querySelector(".painelDireita").style.backgroundColor = "rgb(88, 88, 88)"
      document.querySelector(".painelEsquerda").style.backgroundColor = "rgb(88, 88, 88)"
      document.querySelector(".buttonContainer").style.backgroundColor = "rgb(30, 30, 30)"

      document.querySelector(".tabC").style.borderTopLeftRadius = "10px"
      document.querySelector(".tabC").style.borderBottomLeftRadius = "10px"

      var li = document.querySelectorAll(".painelEsquerda .menu li")
      li.forEach(element => {
        element.style.backgroundColor = "rgb(88, 88, 88)"
        element.style.color = "rgb(255, 255, 255)"

        element.querySelectorAll("i").forEach(i => {
          i.style.color = "white"
        });

      });
    }
  }
</script>


<!-- Btn Menu -->
<script>
  function btnMenuTroca(x) {
  x.classList.toggle("change");
}
</script>
</html>