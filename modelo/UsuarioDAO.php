<?php
    include_once base_dir('modelo/Conexao.php');

    class UsuarioDAO{
        public static function inserir(modelo\us\Usuario $usuario = null){
            if(!is_object($usuario)){
                throw new Exception("Dados do Usuário incompletos");
            }

            $query = "INSERT INTO tb_usuario ";
            $query .= "(nome, email, senha) ";
            $query .= "VALUES ";
            $query .= "(:nome, :email, :senha);";

            try {
                //abrir a conexao
                $conexao = Conexao::abrir_conexao();
            }catch (Exception $erro){
                throw new Exception($erro->getMessage());
            }

            //preparando a consulta(query)
            $envio = $conexao->prepare($query);

            //informar os valores a serem inseridos na tabela
            $envio->bindParam(':nome', $usuario->nome, PDO::PARAM_STR);
            $envio->bindParam(':email', $usuario->email, PDO::PARAM_STR);
            $envio->bindParam(':senha', $usuario->senha, PDO::PARAM_STR);

            //executo a consulta(envio)
            $envio->execute();

            return true;
        }

        public static function buscarPorEmail($email = ""){
            $query = "SELECT * FROM tb_usuario ";
            $query .= " WHERE email=:email LIMIT 1;";

            try {
                //abrir a conexao
                $conexao = Conexao::abrir_conexao();
            }catch (Exception $erro){
                throw new Exception($erro->getMessage());
            }

            //Preparando busca
            $busca = $conexao->prepare($query);


            //substituindo parametro
            $busca->bindParam(':email', $email, PDO::PARAM_STR);

            //executando busca
            $busca->execute();

            //retornando objeto com os dados da busca
            return $busca->fetch(PDO::FETCH_OBJ);
        }

        public static function buscarTodos(){
            $query = "SELECT * FROM tb_usuario";

            try {
                //abrir a conexao
                $conexao = Conexao::abrir_conexao();
            }catch (Exception $erro){
                throw new Exception($erro->getMessage());
            }

            $busca = $conexao->prepare($query);

            $busca->execute();

            return $busca->fetchAll(PDO::FETCH_OBJ);
        }


        public static function buscarPorId($id = ""){
            $query = "SELECT * FROM tb_usuario ";
            $query .= " WHERE id_usuario=:id_usuario LIMIT 1;";

            try {
                //abrir a conexao
                $conexao = Conexao::abrir_conexao();
            }catch (Exception $erro){
                throw new Exception($erro->getMessage());
            }

            //Preparando busca
            $busca = $conexao->prepare($query);

            //substituindo parametro
            $busca->bindParam(':id_usuario', $id, PDO::PARAM_STR);

            //executando busca
            $busca->execute();

            //retornando objeto com os dados da busca
            return $busca->fetch(PDO::FETCH_OBJ);
        }

        public static function alterar(modelo\us\Usuario $usuario = null, $id = ""){
            if(!is_object($usuario)){
                throw new Exception("Dados do Usuário incompletos");
            }

            $query = "UPDATE tb_usuario SET ";
            $query .= "nome=:nome, ";
            $query .= "email=:email, ";
            $query .= "senha=:senha ";
            $query .= "WHERE id_usuario=:id_usuario;";

            try {
                //abrir a conexao
                $conexao = Conexao::abrir_conexao();
            }catch (Exception $erro){
                throw new Exception($erro->getMessage());
            }

            //prepara a consulta
            $atualiza = $conexao->prepare($query);

            //substituição dos campos
            $atualiza->bindParam(":nome", $usuario->nome, PDO::PARAM_STR);
            $atualiza->bindParam(":email", $usuario->email, PDO::PARAM_STR);
            $atualiza->bindParam(":senha", $usuario->senha, PDO::PARAM_STR);
            $atualiza->bindParam(":id_usuario", $id, PDO::PARAM_STR);

            //executando o update
            $atualiza->execute();

            return true;
        }

        public static function excluir($id = ""){
            $query = "DELETE FROM tb_usuario WHERE id_usuario=:id_usuario";

            try {
                //abrir a conexao
                $conexao = Conexao::abrir_conexao();
            }catch (Exception $erro){
                throw new Exception($erro->getMessage());
            }

            //prepara a consulta
            $apaga = $conexao->prepare($query);

            //substitui : pelo valor do id
            $apaga->bindParam(":id_usuario", $id, PDO::PARAM_STR);

            //executa a exclusão
            $apaga->execute();

            return true;
        }
    }
