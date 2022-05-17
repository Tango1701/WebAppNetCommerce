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
            <div class="logo"></div>
        </header>
        
        <div class="pageLogin">

            <img src="/NetCommerce/View/IMG/ubuntu.jpg" id="bg">

            <form class="formulario" id="formulario" method="POST" action="/NetCommerce/index.php/log"> <br>
                <h2>Iniciar Sessão</h2>  <br> <br> <br>
                
                <div>
                    <img src="/NetCommerce/View/IMG/arroba.png">
                    <input type="text" name="userN" placeholder="Email" required>
                </div> <br> <br>
                <div>
                    <img src="/NetCommerce/View/IMG/Key_Blue.png">
                    <input type="password" name="passW" placeholder="Palavra Passe" required> 
                </div> <br> <br> <br>
                <input type="submit" value="Entrar" class="btn"> <br>
                <label >Ou</label> <br>
                <input type="button" onclick="vaiReg()" id="asideBtn" value="Criar Conta"> <br>
               
                <h5>Desenvolvido por: Mateus Tango</h5> <br>

            </form>
        </div>
        
        <form class="reg" id="reg" method="POST" action="/NetCommerce/Model/Cadastro.php" enctype="multipart/form-data">  <br>
                <h2>Criar Conta</h2> <br> <br>
                
                <div>
                    <img src="/NetCommerce/View/IMG/User_Blue.png">
                    <input type="text" name="nome" placeholder="Primeiro e Último Nome" required>
                </div> <br>
                <div> 
                    <img src="/NetCommerce/View/IMG/arroba.png">
                    <input type="text" name="email" placeholder="Email" required>
                </div> <br>
                <div>
                    <img src="/NetCommerce/View/IMG/Key_Blue.png">
                    <input type="password" name="senha" placeholder="Palavra Passe" required> 
                </div> <br>

                <div>
                    <img src="/NetCommerce/View/IMG/Picture.png">
                    <input type="file" name="foto" required> 
                </div> <br> <br> <br>

                <input type="submit" value="Criar Conta" class="btn"> <br>
                <h5>Já tem conta?</h5> <br>
                <button onclick="vaiLogin()" id="asideBtn">Iniciar Sessão</button> <br>
                
                <h5>Desenvolvido por: Mateus Tango</h5>
        </form>

    </div>
</body>

<script>

    var formReg = document.getElementById("reg")
    var formLog = document.getElementById("formulario")

    var vaiLogin = () => {
        formReg.style.display = "none"
        formLog.style.display = "flex"
    }

    var vaiReg = () => {
        formReg.style.display = "flex"
        formLog.style.display = "none"
    }
    
</script>


</html>