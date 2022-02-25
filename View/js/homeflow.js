function showPanel(panelIndex)
{
    var tabPanels = document.querySelectorAll(" .cHome"); 
  
    tabPanels.forEach(function(node){
        node.style.display = "none";
    });

    tabPanels[panelIndex].style.display = "block";
}

function troca(index){
    
   var paineis = document.querySelectorAll(" .mm");
   var ids = document.getElementsByClassName(" mm");
   
    paineis.forEach(function(node){
        node.style.display = "none";
    });
    
    ids[index].style.display = "block";
   
};

