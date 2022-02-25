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
            <h2>Negócio Informal</h2>
            <div class="logo"></div>
        </header>
        <div class="imagem">
            <img src="/NetCommerce/View/IMG/pc_tablet.jpg">
        </div>
        <div class="overlay"></div>
        
        <form class="formulario" id="formulario" method="POST" action="/NetCommerce/index.php/log"> <br>
            <h1>Iniciar Sessão</h1> <br> <br>
            <label id="lbl">Nome de Usuário</label> <br>
            <input type="text" id="txt" name="userN" required> <br> <br>
            <label id="lbl">Palavra Passe</label> <br>
            <input type="password" name="passW"  id="txt" required> <br> <br> <br>
            <input type="submit" value="Entrar" id="btn"> <br> <br>
            <h5>Desenvolvido por: Mateus Tango</h5>

        </form>
        
    </div>
</body>



</html>

