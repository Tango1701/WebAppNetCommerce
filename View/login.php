<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/NetCommerce/View/css/login.css">
    <title>Iniciar Sessão</title>
</head>

<body>

    <div class="fundo">

        <header>
            <h1>NetCommerce</h1> <br>
            <!-- <h2>Negócio Informal</h2> -->
            <div class="logo"></div>
        </header>
        <div class="imagem">
            <!-- <img src="/NetCommerce/View/IMG/pc_tablet.jpg"> -->
        </div>
        <div class="pageLogin">

            <form class="formulario" id="formulario" method="POST" action="/NetCommerce/index.php/log"> 
                <h2>Iniciar Sessão</h2> 
                
                <div>
                    <img src="/NetCommerce/View/IMG/User_Blue.png">
                    <input type="text" name="userN" placeholder="Nome de Usuario" required>
                </div> 
                <div>
                    <img src="/NetCommerce/View/IMG/Key_Blue.png">
                    <input type="password" name="passW" placeholder="Palavra Passe" required> 
                </div>
                <input type="submit" value="Entrar" class="btn"> 
               
                <h5>Desenvolvido por: Mateus Tango</h5>

            </form>
        </div>
        <aside id="login"> <br>
            <img src="/NetCommerce/View/IMG/add_user.png"> <br>
            <h3>Criar Conta</h3> <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Nesciunt mollitia laboriosam in animi ipsam
                fugit omnis consequatur provident consequuntur officiis
                saepe, nihil aut? Labore repudiandae est dolorem ipsum in vitae?
            </p> <br>
            <button onclick="vaiReg()" >Criar Conta</button>
        </aside>
        <aside id="registro"> <br>
            <img src="/NetCommerce/View/IMG/User.png" > <br>
            <h3>Iniciar Sessão</h3> <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Nesciunt mollitia laboriosam in animi ipsam
                fugit omnis consequatur provident consequuntur officiis
                saepe, nihil aut? Labore repudiandae est dolorem ipsum in vitae?
            </p> <br>
            <button onclick="vaiLogin()">Iniciar Sessão</button>
        </aside>
        
        <form class="reg" id="reg" method="POST" action="/NetCommerce/index.php/reg"> 
                <h2>Criar Conta</h2> 
                
                <div>
                    <img src="/NetCommerce/View/IMG/User_Blue.png">
                    <input type="text" name="nome" placeholder="Primeiro e Último Nome" required>
                </div>
                <div>
                    <img src="/NetCommerce/View/IMG/arroba.png">
                    <input type="text" name="email" placeholder="Email" required>
                </div> 
                <div>
                    <img src="/NetCommerce/View/IMG/Key_Blue.png">
                    <input type="password" name="senha" placeholder="Palavra Passe" required> 
                </div>
                <input type="submit" value="Criar Conta" class="btn"> 
               
                <h5>Desenvolvido por: Mateus Tango</h5>
        </form>

    </div>
</body>

<script>
    var telaReg = document.getElementById("registro")
    var telaLog = document.getElementById("login")

    var formReg = document.getElementById("reg")
    var formLog = document.getElementById("formulario")

    var vaiLogin = () => {
        telaLog.style.display = "flex"
        telaReg.style.display = "none"

        formReg.style.display = "none"
        formLog.style.display = "flex"
    }

    var vaiReg = () => {
        telaLog.style.display = "none"
        telaReg.style.display = "flex"

        formReg.style.display = "flex"
        formLog.style.display = "none"
    }
    
</script>


</html>