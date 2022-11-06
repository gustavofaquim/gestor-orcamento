<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Usuario;

 class Categoria{

    private int $idcategoria;
    private Usuario $usuarios;
    private string $descricao;
    private string $icon;
    private string $cor;


    public function __construct(){
        
    }


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}