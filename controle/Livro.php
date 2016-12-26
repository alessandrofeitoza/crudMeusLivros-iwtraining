<?php
    include_once base_dir('modelo/Conexao.php');
    include_once base_dir('modelo/Livro.php');
    include_once base_dir('modelo/LivroDAO.php');

    use modelo\li;

    class Livro{
        public static function listar(){
            Validar::autorizar();
            try {
                $livros = LivroDAO::buscarTodos();
            }catch (Exception $erro){
                redirect(base_url("?erro=".$erro->getMessage()));
            }

            include_once base_dir('visao/livro/listar.php');
        }

        //carrega o form para um novo livro ser cadastrado
        public static function novo(){
            Validar::autorizar();

            include_once base_dir('visao/livro/novo.php');
        }

        //recebe os dados pelo form e inclui no banco
        public static function inserir(){
            Validar::autorizar();

            $titulo = strip_tags($_POST['titulo']);
            $autor = strip_tags($_POST['autor']);
            $editora = strip_tags($_POST['editora']);
            $ano = strip_tags($_POST['ano']);
            $criado_em = date("d/m/Y H:i:s");

            $us = $_SESSION['usuario'];
            $usuario_id = $us->id_usuario;


            $livro = new modelo\li\Livro($titulo, $autor);
            $livro->editora = $editora;
            $livro->ano = $ano;
            $livro->usuario_id = $usuario_id;
            $livro->criado_em = $criado_em;

            try{
                LivroDAO::inserir($livro);
            }catch(Exception $erro){
                redirect(base_url("?erro=".$erro->getMessage()));
            }

            redirect(base_url("?sucesso=Livro Inserido"));
        }

        public static function excluir(){
            Validar::autorizar();

            if(!isset($_GET['id'])){
                redirect(base_url('?erro=Livro Não Informado'));
            }

            try {
                LivroDAO::excluir($_GET['id']);
            }catch (Exception $erro){
                redirect(base_url('?erro='.$erro->getMessage()));
            }

            redirect(base_url('?sucesso=Livro Excluido'));
        }

        public static function editar(){
            Validar::autorizar();

            if(!isset($_GET['id'])){
                redirect(base_url('?erro=Livro não informado'));
            }

            //buscando livro para ser editado
            $livro = LivroDAO::buscarPorId($_GET['id']);

            if($livro == false){
                redirect(base_url('?erro=Livro não encontrado'));
            }

            include_once base_dir('visao/livro/editar.php');
        }

        public static function atualizar(){
            Validar::autorizar();

            if(!isset($_POST['id'])){
                redirect(base_url('?erro=Livro não informado'));
            }

            $titulo = strip_tags($_POST['titulo']);
            $autor = strip_tags($_POST['autor']);
            $editora = strip_tags($_POST['editora']);
            $ano = strip_tags($_POST['ano']);

            $livro = new modelo\li\Livro($titulo, $autor);
            $livro->editora = $editora;
            $livro->ano = $ano;

            try{
                LivroDAO::alterar($livro, $_POST['id']);
            }catch (Exception $erro){
                redirect(base_url("?erro=".$erro->getMessage()));
            }

            redirect(base_url("?sucesso=Livro Atualizado"));
        }
    }
