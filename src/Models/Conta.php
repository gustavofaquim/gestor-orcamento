<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Usuario;

 class Conta{

    
    private int $idconta;
    private Usuario $usuario;
    private string $nome;
    private String $descricao;
    private float $saldo;
    //private $transacoes;


    public function __construct(){
        
    }


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


   

 }

?>