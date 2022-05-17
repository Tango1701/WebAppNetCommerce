function AbreFiltro () {

    
}


function mostraPainel(panelIndex, ColorCode)
{
    var tabButtons = document.querySelectorAll(".painelTop .buttonContainer .button");
    var tabPanels = document.querySelectorAll(".painelTop .tabC .funcoes"); 

    tabButtons.forEach(function(node){
        node.style.backgroundColor="";
        node.style.color = "";
    });

    // tabButtons[panelIndex].style.backgroundColor = ColorCode;
    tabButtons[panelIndex].style.color = "white";
    tabPanels.forEach(function(node){
        node.style.display = "none";
    });

    tabPanels[panelIndex].style.display = "flex";
    // tabPanels[panelIndex].style.backgroundColor = ColorCode;


    // Script para buscar as categorias para o filtro
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


