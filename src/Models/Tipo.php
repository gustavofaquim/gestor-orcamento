<?php 
namespace GenericMvc\Models;


 class Tipo{

    
    private int $idtipo;
    private string $descricao;

    public function __construct(){
        
    }


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


 }

