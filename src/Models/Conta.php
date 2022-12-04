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

    public function atualizarSaldo($valor, $tipo){
        if($tipo == 1){
            $this->saldo = $this->saldo - $valor;
        }else if($tipo == 2){
            $this->saldo = $this->saldo + $valor;
        }
        return $this->saldo;
    }


 }

?>