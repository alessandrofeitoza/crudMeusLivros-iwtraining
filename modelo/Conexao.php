<?php
class Conexao{
    //Atributo estático para que sempre seja usada a mesma conexao
    private static $conexao;

    public static function abrir_conexao(){
        try {
            self::$conexao = new PDO(
                'mysql:host=localhost; dbname=db_iw_meuslivros',
                'root', //usuario do banco
                'livre', //senha do usuario
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        }catch(Exception $erro){
            throw new Exception("Não foi possivel conectar ao banco de dados");
        }

        return self::$conexao;
    }

    public function pegar_conexao(){

    }

    public function fechar_conexao(){

    }
}
