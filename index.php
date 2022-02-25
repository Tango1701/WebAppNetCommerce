<?php
    define('basepath',$_SERVER['DOCUMENT_ROOT']);

    require_once basepath."/NetCommerce/Controller/CHome.php";
    
    
    $endereco = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if($endereco == '/NetCommerce/index.php/home')
        {
            $control = new CHome();
            $control->chamaHome();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/userhome')
        {
            header("location: /NetCommerce/View/UserHome.php");
        }
        if($endereco == '/NetCommerce/index.php')
        {
            $control = new CHome();
            $control->chamaLogin();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/log')
        {
            $control = new CHome();
            $control->Entrar();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/logoff')
        {
            $control = new CHome();
            $control->Sair();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/')
        {
            $control = new CHome();
            $control->chamaLogin();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/aprovarProduto')
        {
            $control = new CHome();
            $control->AprovaProduto();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/compra')
        {
            $control = new CHome();
            $control->Compra();
            unset($control);
        }
        if($endereco == '/NetCommerce/index.php/vender')
        {
            $control = new CHome();
            $control->Venda();
            unset($control);
        }
     else{
            echo "<h1> ERRO! 404 - Pagina fora de... </h1>";
            echo "<h2>O endereço «".$endereco."» não está disponivel no momento.</h2>";
        }
 ?>
