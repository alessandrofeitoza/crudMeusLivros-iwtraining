<?php
    include_once 'config.php';
    include_once 'controle/Validar.php';
    include_once 'controle/Livro.php';

    session_start();
    if(isset($_SESSION['usuario'])){
        $us = $_SESSION['usuario'];
    }

    function pagina_conteudo(){
        global $us;

        //chamando o metodo que mostrara mensagens na tela
        Validar::validar_notificacao();

        if(!Validar::validar_opcao()){
           if(!isset($us)){
               include_once base_dir("visao/login.php");
           }else{
               include_once base_dir("visao/header.php");
               Livro::listar();
           }
        }


    }


    include_once 'visao/base.php';
?>
