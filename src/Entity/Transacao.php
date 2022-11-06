<?php
namespace GenericMvc\Entity;

use GenericMvc\Entity\Conta;
use GenericMvc\Entity\Categoria;
use GenericMvc\Entity\TipoTransacao;
/**
 * @Entity
 * @Table(name="transacao")
 */
class Transacao
{
    /**
     * @var integer $idtransacao
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $idtransacao;


    /**
    * @var object $conta
    * @OManyToOne(targetEntity: "Conta")
    * @JoinColumn(name="conta", referencedColumnName="idconta", nullable=false)
    */
    private $conta;

    
    /**
    * @var object $tipo
    * @OManyToOne(targetEntity="TipoTransacao")
    * @JoinColumn(name="tipo", referencedColumnName="idtipo", nullable=false)
    */
    private $tipo;


    /**
    * @var object $categoria
    * @OManyToOne(targetEntity="Categoria")
    * @JoinColumn(name="categoria", referencedColumnName="idcateogira", nullable=false)
    */
    private $categoria;


    /**
     * @var double $valor
     * @Column(type="string")
     */
    private $valor;

    /**
    * @var string $data
    * @Column(type="string")
    */
    private $data;

    /**
    * @var string $comentario
    * @Column(type="string")
    */
    private $comentario;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function addConta(Conta $conta){
        $this->conta = $conta;
        return $this;
    }

}
