<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Categoria;

class Usuario{

    private int $idusuario;
    private string $primeiroNome;
    private string $ultimoNome;
    private string $usuario;
    private string $email;
    private string $senha;
    private Categoria $categorias;
    private Array $contas = [];

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function addConta($valor){
        $this->contas = $valor;
    }

    public function senhaEstaCorreta(string $senhaPura): bool{
        return password_verify($senhaPura, $this->senha);
    }

    public function saldoTotal(){
        
        $saldo = $this->contas->__get('saldo');

        return $saldo;
    }

    
}