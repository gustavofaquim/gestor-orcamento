<?php
namespace GenericMvc\Entity;

use GenericMvc\Entity\Conta;
/**
 * @Entity
 * @Table(name="transacao")
 */
class Transacao
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $idtransacao;


    /**
    * @OManyToOne(targetEntity: Conta::class, inversedBy="transacoes")
    * @JoinColumn(nullable=false)
    */
    private $conta;

    
    /**
    * @Column(type="integer")
    */
    private $tipo;

    /**
    * @OManyToOne(targetEntity="Categoria")
    * @JoinColumn(nullable=false)
    */
    private $categoria;

    /**
     * @Column(type="decimal")
     */
    private $valor;

      /**
     * @Column(type="string")
     */
    private $data;

    /**
    * @Column(type="string")
    */
    private $comentario;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function setConta(Conta $conta){
        $this->conta = $conta;
        return $this;
    }

}
