<?php

include_once base_dir("modelo/Usuario.php");
include_once base_dir("modelo/UsuarioDAO.php");

use modelo\us;

class Usuario{
    //aparecerá o form
    public static function novo(){
        include_once base_dir('visao/usuario/novo.php');
    }

    //recebera dados do form
    public static function inserir(){
        //recebendo os dados
        $nome = strip_tags($_POST['nome']);
        $email = strip_tags($_POST['email']);
        $senha = password_hash(strip_tags($_POST['senha']), PASSWORD_BCRYPT);

        //preparando o objeto para inserçao
        $us = new modelo\us\Usuario($email, $senha);
        $us->nome = $nome;

        //inserindo
        try {
            UsuarioDAO::inserir($us);
            Usuario::login($email, $_POST['senha']);
        }catch (Exception $erro){
            $caminho = base_url("?erro=$erro->getMessage()");
            redirect($caminho);
        }

        return false;

    }

    //excluir usuário
    public static function excluir(){
        Validar::autorizar();

        $us = $_SESSION['usuario'];

        try {
            UsuarioDAO::excluir($us->id_usuario);
        }catch (Exception $erro){
            redirect(base_url("?erro=".$erro->getMessage()));
        }

        session_destroy();
        redirect(base_url("?sucesso=Conta Excluida"));
    }

    //carrega o form de ediçao
    public static function editar(){
        Validar::autorizar();

        $us = $_SESSION['usuario'];
        include_once base_dir('visao/usuario/editar.php');
    }

    //atualiza, recebe dados do form (editar)
    public static function atualizar(){
        Validar::autorizar();

        $us = $_SESSION['usuario']; //recuperando dados do usuario


        $nome = strip_tags($_POST['nome']);
        $email = strip_tags($_POST['email']);


        $senha = $us->senha;

        if($_POST['senha'] != ""){
            $senha = password_hash(strip_tags($_POST['senha']), PASSWORD_BCRYPT);
        }

        $us_atualizar = new modelo\us\Usuario($email, $senha);
        $us_atualizar->nome = $nome;

        $us->nome = $nome;
        $us->senha = $senha;
        $us->email = $email;

        UsuarioDAO::alterar($us_atualizar, $us->id_usuario);

        $_SESSION['usuario'] = $us;

        redirect(base_url("?sucesso=Dados Atualizados"));
    }

    //cria sessao
    public static function login($email = false, $senha = false){
        //receber os dados
        $email = ($email != false)?$email:$_POST['email'];
        $senha = ($senha != false)?$senha:$_POST['senha'];

        try{
          //buscar no banco
          $us = UsuarioDAO::buscarPorEmail($email);
        }catch(Exception $erro){
          redirect(base_url("?erro=".$erro->getMessage()));
          return false;
        }

        if(!$us){
            $caminho = base_url("?erro=Usuário não encontrado");
            redirect($caminho);
            return false;
        }

        if(!password_verify($senha, $us->senha)){
            $caminho = base_url("?erro=Senha Incorreta");
            redirect($caminho);
            return false;
        }

        //criar uma sessao com os dados do usuario
        $_SESSION['usuario'] = $us;

        $caminho = base_url("?sucesso=Bem vindo $us->nome");
        redirect($caminho);
    }

    //destroi sessao
    public static function logout(){
        session_destroy();

        $caminho = base_url("?sucesso=Você Saiu");
        redirect($caminho);
    }
}
