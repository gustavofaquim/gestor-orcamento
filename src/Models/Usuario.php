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
    private Array $categorias = [];
    private Array $contas = [];
    private Array $transacoes = Array();

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

   
    public function addConta($valor){  /* Não está sendo usado no momento */
        $this->contas = $valor;
    }

    public function addTransacao($valor){
        //echo "GenericMvc\Models -------------------------- <br>";
        //var_dump($valor);
        //exit();
        $this->transacoes[] = $valor;
        
    }

    
    public function senhaEstaCorreta(string $senhaPura): bool{
        return password_verify($senhaPura, $this->senha);
    }

    public function teste(){
        var_dump($this->transacoes);
    }

    public function saldoTotal(){

        $saldo = 0;
        $total = 0;

        foreach($this->contas as $conta){
            $saldo += $conta->__get('saldo');
            
        }
        
        //var_dump($this->transacoes);
        //exit();
        
        foreach($this->transacoes as $transacao){
           //var_dump($transacao->__get('tipo'));
            if($transacao->__get('tipo')->__get('idtipo') == 1){
                 //echo "<br>";
                //var_dump($transacao->__get('idtransacao'));
                //var_dump($transacao->__get('valor'));
                $total += $transacao->__get('valor');
                //var_dump($total);
            }
           
        }
        var_dump($saldo);
        //var_dump($total);
        //var_dump($saldo);
        $saldo = $saldo - $total;
       
        return $saldo;
    }

    
}