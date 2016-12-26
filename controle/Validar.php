<?php

class Validar{
    public static function validar_opcao(){
        if(!isset($_GET['entidade']) || !isset($_GET['acao']))  {
            return false;
        }


        $classe = ucfirst($_GET['entidade']);
        $metodo = $_GET['acao'];

        include_once base_dir("controle/$classe.php");

        $classe::$metodo();
        return true;
    }

    public static function validar_notificacao(){
        if(isset($_GET['sucesso'])){
            $alert_class = "success";
            $alert_msg = $_GET['sucesso'];
            include_once base_dir('visao/alert.php');
        }else if(isset($_GET['erro'])){
            $alert_class = "danger";
            $alert_msg = $_GET['erro'];
            include_once base_dir('visao/alert.php');
        }

        return false;
    }

    public static function autorizar(){
        if(!isset($_SESSION['usuario'])){
            redirect(base_url('?erro=Precisa estar logado'));
        }
    }
}