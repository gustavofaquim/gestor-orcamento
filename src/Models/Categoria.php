<?php 
namespace GenericMvc\Models;

use GenericMvc\Models\Usuario;
use GenericMvc\Models\Tipo;

 class Categoria{

    private int $idcategoria;
    private Tipo $tipotransacao;
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