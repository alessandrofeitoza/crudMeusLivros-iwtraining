<?php

namespace modelo\li;

class Livro{
    private $dados = [];

    public function __construct($titulo, $autor){
        $this->dados['titulo'] = $titulo;
        $this->dados['autor'] = $autor;
    }

    public function __set($indice, $valor){
        $this->dados[$indice] = $valor;
    }

    public function &__get($indice){
        return $this->dados[$indice];
    }
}