<?php 

namespace GenericMvc\Entity;
/**
 * @Entity
 * @Table(name="categoria")
 */

 class Categoria{

    /**
     * @var integer $idcategoria
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $idcategoria;

    /**
    * @var string $descricao
    * @Column(type="string")
    */
    private $descricao;


    /**
    * @var string $icon
    * @Column(type="string")
    */
    private $icon;

   public function __get($atributo){
      return $this->$atributo;
   }

   public function __set($atributo,$valor){
      $this->$atributo = $valor;
   }

 }

?>