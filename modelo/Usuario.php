<?php
namespace modelo\us;

class Usuario{
    private $dados = [];

    public function __construct($email, $senha){
        $this->dados['email'] = $email;
        $this->dados['senha'] = $senha;
    }

    public function __set($indice, $valor){
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice){
        return $this->dados[$indice];
    }
}
