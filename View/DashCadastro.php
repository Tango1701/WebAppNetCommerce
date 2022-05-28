<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/DashCadastro.css" />
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="JS/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="JS/bootstrap-5.0.0-beta1-dist/css/bootstrap-utilities.css" />
    <link rel="stylesheet" href="JS/fontawesome-free-5.15.1-web/css/all.css" />
    <script src="JS/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"></script>
    <title>Criar Conta</title>
  </head>
  <body>
    <div class="fundo">
      <div class="frontPanel">

        <hr> <br> <div class="cabecalho">
            <h3>Criar Conta</h3>
            <div class="barraprogresso">
                <div class="bolha"><i class="fa fa-user"></i></div>
                <div class="passo"><h5>Dados Pessoais</h5></div>
                <div class="bolha"><i class="fa fa-money-bill"></i></div>
                <div class="passo"><h5>Dados Bancários</h5></div>
                <div class="bolha"><i class="fa fa-id-card"></i></div>
                <div class="passo"><h5> Tipo de Serviço</h5></div>
                <div class="bolha"><i class="fa fa-file-contract"></i></div>
                <div class="passo"><h5> Confirmação</h5></div>
                <div class="bolha"><i class="fa fa-check"></i></div>

            </div> 
        </div> <hr> <br>
        <form method="post" enctype="multipart/form-data" action="/NetCommerce/index.php/reg">
            
            <!-- Dados Pessoais -->
            <div class="form">
                <div>
                    <label for="fname">Nome Completo</label>
                    <input
                        type="text"
                        id="Nome"
                        name="Nome"
                        placeholder="Nome Completo"
                        
                    />
    
                    <label for="lname">Data de Nascimento</label>
                    <input
                        type="date"
                        id="DataNascimento"
                        name="DataNascimento"
                        
                    />
                    <br>
                    <label for="fname">Bilhete de Identidade</label>
                    <input
                        type="text"
                        id="BI"
                        name="BI"
                        placeholder="Nº do BI"
                        
                    />
    
                    <label for="lname">Estado Civíl</label>
                    <select id="EstadoCivil" name="EstadoCivil" >
                        <option value="Solteiro">Solteiro(a)</option>
                        <option value="Casado">Casado(a)</option>
                    </select>
    
                    <label for="Sexo">Sexo</label>
                    <select id="Sexo" name="Sexo" >
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div>
                    <label for="Telefone">Número(s) de Telefone</label>
                    <input
                        type="number"
                        id="Telefone"
                        name="Telefone"
                        placeholder="Ex. 924 377 250"
                        
                    />
                    <label for="Email">Email</label>
                    <input
                        type="email"
                        id="Email"
                        name="Email"
                        placeholder="meuemail@gmail.com"
                        
                    />
    
                    <label for="Morada">Morada</label>
                    <input
                        type="text"
                        id="Morada"
                        name="Morada"
                        placeholder="Minha Morada"
                        
                    />
    
                    <label for="Provincia">Província</label>
                    <select id="Provincia" name="Provincia" >
                        <option value="Luanda">Luanda</option>
                        <option value="Benguela">Benguela</option>
                        <option value="Kwanza Norte">Kwanza Norte</option>
                    </select> 
                    <input type="button" value="Próximo Passo" id="btnProximo" onclick="InsereDadosPessoais()"  />
    
                </div>
            </div>
            
            <!-- Dados Bancários -->
            <div class="form">
                <div>
                    <label for="Banco">Entidade Bancária</label>
                    <select id="Banco" name="Banco">
                        <option value="BIC">BIC</option>
                        <option value="BFA">BFA</option>
                    </select>
                    <label for="Titular">Nome do Titular</label>
                    <input
                        type="text"
                        id="Titular"
                        name="Titular"
                        placeholder="Nome do Titular"
                    />
    
                    <label for="Conta">Nº da Conta</label>
                    <input
                        type="number"
                        id="Conta"
                        name="Conta"
                    />
                    <br>
                    <label for="IBAN">IBAN (International Bank Account number)</label>
                    <input
                        type="text"
                        id="IBAN"
                        name="IBAN"
                        placeholder="IBAN"
                    />
                       
                </div>
                <div>
                    <label for="Doc_BI">Bilhete de Identidade</label>
                    <input
                        type="file"
                        id="Doc_BI"
                        name="Doc_BI"
                    />
                    <label for="Doc_Conta">Documento de dados da Conta</label>
                    <input
                        type="file"
                        id="Doc_Conta"
                        name="Doc_Conta"
                    />
    
                    <label for="Doc_Photo">Fotografia</label>
                    <input
                        type="file"
                        id="Doc_Photo"
                        name="Doc_Photo"
                    />
    
                    <input type="button" value="Próximo Passo" id="btnProximo" onclick="InsereDadosBancarios()" />
    
                </div>
            </div>

            <!-- Tipo de Serviço -->
            <div class="form">
                <div>
                    <h3> <b>Comissão</b> </h3>
                    <p>
                        Na Comissão para cada venda efectuada será descontada uma taxa percentual 
                        de serviço. Essa taxa pode variar de acordo com o tipo de artigo que estiver
                        a ser vendido. <br>
                        <b>Dinheiro Recebido = Preço da Venda (AOA) - Taxa de Serviço (%)</b>.
                    </p>
                    <video controls>
                        <source src="./Video/Cypher_Afro_dance.mp4" 
                        type="video/mp4">
                    </video>
                    <input type="button" value="Pagamento por Comissão" id="btnProximo" onclick="finaliza(0)" />
                    
                </div>
                <div>
                    <h3><b>Subscrição</b></h3>
                    <p>
                        Na Subscrição <b> terá de pagar previamente para reservar um espaço no nosso estabelecimento </b>
                        para armazenarmos o seu artigo <b> durante um período de tempo </b>. Preço varia de acordo com o 
                        tamanho e peso do artigo bem como o tempo da reserva. Após a venda não será descontada 
                        nenhuma comissão.
                    </p>
                    <video controls>
                        <source src="./Video/Cypher_Afro_dance.mp4" 
                        type="video/mp4">
                    </video>

                    <input type="button" value="Pagamento por Subscrição" id="btnProximo" onclick="finaliza(1)" />

                </div>
            </div>

             <!-- Confirmação dos dados -->
             <div class="form">
                
                    <div class="confirma">
                        <div class="lbl"><label>Nome Completo</label></div>
                        <input type="text" id="NomeC"  required />
                        <div class="lbl">
                            <label>Data de nascimento</label>
                            <label>Nº BI</label> 
                        </div>
                        
                        <input type="text" id="DataNascimentoC"  required />
                        <input type="text" id="BIC"  required />
                        <div class="lbl"><label>Sexo</label></div>
                        <input type="text" id="SexoC"  required />
                        <div class="lbl">
                            <label>Estado Civil</label>
                            <label>Nº Telefone</label> 
                        </div>
                        <input type="text" id="EstadoCivilC"  required />
                        <input type="text" id="TelefoneC"  required />
                        <div class="lbl">
                            <label>Email</label>
                            <label>Provincia</label> 
                        </div>
                        <input type="text" id="EmailC"  required />
                        <input type="text" id="ProvinciaC"  required />
                        
                        <br> <br>
                        <button  id="Editar"> <i class="fa fa-edit"></i> Editar</button>
                    </div>
                    <div class="confirma">
                        <div class="lbl"><label>Tipo de Serviço</label></div>
                        <input type="text" id="TipoC"  required />
                        <div class="lbl"><label>Morada</label></div>
                        <input type="text" id="MoradaC"  required />
                        <div class="lbl">
                            <label>Banco</label>
                            <label>Nº da Conta</label> 
                        </div>
                        <input type="text" id="BancoC"  required />
                        <input type="text" id="ContaC"  required />
                        <div class="lbl"><label>Titular</label></div>
                        <input type="text" id="TitularC"  required />
                        <div class="lbl"><label>IBAN</label></div>
                        <input type="text" id="IBANC"  required />
                        <br> <br>
                        <button type="submit" id="Salvar"> <i class="fa fa-save"></i> Confirmar</button>

                    </div>
                   
                
                    
            </div>

        </form>
      </div>
    </div>
  </body>


  <!-- Load -->
  <script>
      
      window.onload = () => {
        trocaForm(0)
      }
  </script>
  <!-- Troca Formulários -->
  <script>

      var trocaForm = (index) => {
        const forms = document.querySelectorAll(".form")
        const bolhas = document.querySelectorAll(".bolha")
        const passo = document.querySelectorAll(".passo")

        forms.forEach(form => {
            form.style.display = "none"
        });

        bolhas[index].children[0].style.color = "rgb(21, 146, 230)"

        bolhas[index].style.borderColor = "rgb(21, 146, 230)"
        passo[index].style.borderBottomColor = "rgb(21, 146, 230)"
        forms[index].style.display = "flex"


      }

</script>

<!-- Insere Dados Pessoais do Usuário -->
<script>

      
    var objDados = 
    {
        nome: "", 
        nascimento: "", 
        estado_civil: "", 
        sexo: "", 
        bi: "", 
        telefone: "", 
        email: "", 
        morada: "", 
        provincia: "", 
        banco: "", 
        conta: "", 
        iban: "", 
        titular: "", 
    }

    function InsereDadosPessoais(){
  
    
    // Pegar os dados pessoais 
    var form = document.querySelectorAll(".form")

      form.forEach(element => {
          if(element.style.display != "none"){
            
            let inputs = element.querySelectorAll("div input")
            let select = element.querySelectorAll("select")

            objDados.nome = inputs.item(0).value
            objDados.nascimento = inputs.item(1).value
            objDados.bi = inputs.item(2).value
            objDados.estado_civil = select.item(0).value
            objDados.sexo = select.item(1).value
            objDados.telefone = inputs.item(3).value
            objDados.email = inputs.item(4).value
            objDados.morada = inputs.item(5).value
            objDados.provincia = select.item(2).value
          }
      });

    
      trocaForm(1)
  
    }


    const finaliza = (n) => {
        trocaForm(3)
        var confirma = document.querySelectorAll(".confirma input")
        
        confirma[0].value = objDados.nome
        confirma[1].value = objDados.nascimento
        confirma[2].value = objDados.bi
        confirma[3].value = objDados.sexo
        confirma[4].value = objDados.estado_civil
        confirma[5].value = objDados.telefone
        confirma[6].value = objDados.email
        confirma[7].value = objDados.provincia

        if(n == 0)
            confirma[8].value = "Comissão"
        else
            confirma[8].value = "Subscrição"

        confirma[9].value = objDados.morada
        confirma[10].value = objDados.banco
        confirma[11].value = objDados.conta
        confirma[12].value = objDados.titular
        confirma[13].value = objDados.iban
        
    }

  </script>

  <!-- Insere Dados Bancário do Usuário -->
<script>

    function InsereDadosBancarios(){

            // Pegar os dados pessoais 
    var form = document.querySelectorAll(".form")

    form.forEach(element => {
    if(element.style.display != "none"){
      
      let inputs = element.querySelectorAll("div input")
      let select = element.querySelectorAll("select")

      objDados.banco = select.item(0).value
      objDados.titular = inputs.item(0).value
      objDados.conta = inputs.item(1).value
      objDados.iban = inputs.item(2).value

      console.log(objDados)
      trocaForm(2)
    }
    });
   
    }
  
  </script>


</html>
