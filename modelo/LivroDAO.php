<?php

class LivroDAO{
    public static function inserir(modelo\li\Livro $livro = null){
        if(!is_object($livro)){
            throw new Exception("Dados do Livro incompletos");
        }
        $query = "INSERT INTO tb_livro ";
        $query .= "(usuario_id, titulo, autor, editora, ano, criado_em)";
        $query .= " VALUES ";
        $query .= "(:usuario_id, :titulo, :autor, :editora, :ano, :criado_em);";

        try {
            //abrir a conexao
            $conexao = Conexao::abrir_conexao();
        }catch (Exception $erro){
            throw new Exception($erro->getMessage());
        }

        //preparando o envio
        $envio = $conexao->prepare($query);

        //substituindo valores
        $envio->bindParam(":usuario_id", $livro->usuario_id, PDO::PARAM_STR);
        $envio->bindParam(":titulo", $livro->titulo, PDO::PARAM_STR);
        $envio->bindParam(":autor", $livro->autor, PDO::PARAM_STR);
        $envio->bindParam(":editora", $livro->editora, PDO::PARAM_STR);
        $envio->bindParam(":ano", $livro->ano, PDO::PARAM_STR);
        $envio->bindParam(":criado_em", $livro->criado_em, PDO::PARAM_STR);

        //executar o cadastro
        $envio->execute();

        return true;
    }

    public static function buscarTodos(){
        $query = "SELECT * FROM tb_livro ";

        try {
            //abrir a conexao
            $conexao = Conexao::abrir_conexao();
        }catch (Exception $erro){
            throw new Exception($erro->getMessage());
        }
        //preparando busca
        $busca = $conexao->prepare($query);

        //enviando query
        $busca->execute();

        //retornando array de objetos
        return $busca->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscarPorId($id = ""){
        $query = "SELECT * FROM tb_livro WHERE id_livro=:id_livro;";

        try {
            //abrir a conexao
            $conexao = Conexao::abrir_conexao();
        }catch (Exception $erro){
            throw new Exception($erro->getMessage());
        }

        //preparando busca
        $busca = $conexao->prepare($query);

        //substituindo valores
        $busca->bindParam(":id_livro", $id, PDO::PARAM_STR);

        //executando envio
        $busca->execute();

        //retornando objeto livro
        return $busca->fetch(PDO::FETCH_OBJ);
    }

    public static function alterar(modelo\li\Livro $livro = null, $id = ""){
        if(!is_object($livro)){
            throw new Exception("Dados do Livro incompletos");
        }
        $query = "UPDATE tb_livro SET ";
        $query .= "titulo=:titulo, ";
        $query .= "autor=:autor, ";
        $query .= "editora=:editora, ";
        $query .= "ano=:ano ";
        $query .= " WHERE id_livro=:id_livro;";

        try {
            //abrir a conexao
            $conexao = Conexao::abrir_conexao();
        }catch (Exception $erro){
            throw new Exception($erro->getMessage());
        }

        //preparando consulta
        $atualiza = $conexao->prepare($query);

        //substituindo valores
        $atualiza->bindParam(":titulo", $livro->titulo, PDO::PARAM_STR);
        $atualiza->bindParam(":autor", $livro->autor, PDO::PARAM_STR);
        $atualiza->bindParam(":editora", $livro->editora, PDO::PARAM_STR);
        $atualiza->bindParam(":ano", $livro->ano, PDO::PARAM_STR);
        $atualiza->bindParam(":id_livro", $id, PDO::PARAM_STR);

        //executando consulta
        $atualiza->execute();

        return true;
    }

    public static function excluir($id = ""){
        $query = "DELETE FROM tb_livro WHERE id_livro=:id_livro;";

        try {
            //abrir a conexao
            $conexao = Conexao::abrir_conexao();
        }catch (Exception $erro){
            throw new Exception($erro->getMessage());
        }

        //preparando consulta
        $excluir = $conexao->prepare($query);

        //substituindo valores
        $excluir->bindParam(":id_livro", $id, PDO::PARAM_STR);

        //executando consulta
        $excluir->execute();

        return true;
    }
}