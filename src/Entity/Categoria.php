<?php 

namespace GenericMvc\Entity;
/**
 * @Entity
 * @Table(name="categoria")
 */

 class Categoria{

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $idcateogira;

    /**
    * @Column(type="string")
    */
    private $descricao;


    /**
    * @Column(type="string")
    */
    private $icon;

    /**
    * @OneToMany(targetEntity="Transacao", mappedBy="categoria")
    */
    private $transacoes;
 }

?>