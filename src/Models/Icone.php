<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Usuario;
use GenericMvc\Models\Tipo;
use GenericMvc\Models\TipoIcone;

 class Icone{

    private int $idicone;
    private TipoIcone $idtipo;
    private string $nome;
    private string $icone;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


 }