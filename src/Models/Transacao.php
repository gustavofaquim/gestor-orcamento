<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Conta;
use GenericMvc\Models\Tipo;
use GenericMvc\Models\Categoria;

 class Transacao{

    private int $idtransacao;
    private Conta $conta;
    private Tipo $tipo;
    private Categoria $categoria;
    private float $valor;
    private string $data;
    private string $comentario;
    //private $transacoes;


    public function __construct(){}


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


    public function calcularPeriodo(){

        //$data = $transacao->__get('data');
        $semana = Array();
        $semana[] = date('Y-m-d', strtotime('monday this week'));
        $semana[] = date('Y-m-d', strtotime('tuesday this week'));
        $semana[] = date('Y-m-d', strtotime('wednesday this week'));
        $semana[] = date('Y-m-d', strtotime('thursday this week'));
        $semana[] = date('Y-m-d', strtotime('friday this week'));
        $semana[] = date('Y-m-d', strtotime('saturday this week'));
        $semana[] = date('Y-m-d', strtotime('sunday this week'));
        
        $dt = strtotime($this->data);

        //var_dump($semana);

        /*foreach($semana as $objs){
            //$objs = strtotime($objs);
            $mes = date('d');
            
        }*/
        if(date('d',$dt) == date('d')){
            $tempo = 'dia';

        }else if(date('m',$dt) == date('m')){
            $tempo = 'mes';    
        }

        return $tempo;
    }
   

 }

