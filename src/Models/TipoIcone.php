<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Usuario;
use GenericMvc\Models\Tipo;


 class TipoIconeIcone{

    private int $idtipo;
    private string $descricao;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


 }