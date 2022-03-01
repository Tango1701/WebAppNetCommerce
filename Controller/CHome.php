<?php

require_once basepath."/NetCommerce/Model/Sessao.php";
require_once basepath."/NetCommerce/Model/Gestao.php";
require_once basepath."/NetCommerce/Model/Produto.php";

    class CHome
    {
        function chamaHome()
        {
           header("location: /NetCommerce/View/home.php");
        }
        function chamaLogin()
        {
            require basepath.'/NetCommerce/View/login.php';
        }
        function AprovaProduto()
        {
            $control = new Gestao();
            $control->Aprovar();
            unset($control);
        }
        function Compra()
        {
            $control = new Produto();
            $control->Comprar();
            unset($control);
        }
        function Venda()
        {
            $control = new Produto();
            $control->Vender();
            unset($control);
        }
        function Entrar()
        {
            $control = new Sessao();
            $control->login();
            unset($control);
        }
        function Registrar()
        {
            $control = new Sessao();
            $control->registrar();
            unset($control);
        }
        function Sair()
        {
            $control = new Sessao();
            $control->logoff();
            unset($control);
        }
        
    }		

?>