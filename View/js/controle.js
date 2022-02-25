$(document).ready(function(){
  
  
    $(document).on('click','#Cadastro',function(){
        EfeturarCadastro();
    })

});

function EfeturarCadastro()
{
    let form=$('#formUsuario');
     form.submit ( function(item){
        item.preventDefault(); //Impede a Submissao Normal do Formulario
       // Submeter pelo Ajax
      {
        $.ajax({
          url: form.attr('action'),
          method: form.attr('method'),
          data:{NOME:$("#nomealuno").val(),TURME:$("#turnoaluno").val()},
          // Verificar A Resposta de Sucesso
          success:function(i){
                $('#smscadastro').html(i);
                
          },
          error:function () {
            $('#smscadastro').html("Tente Novamente mais Tarde...");
          }
        });
      }
      
    })
      
}


