<?php
namespace GenericMvc\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="usuario")
 */
class Usuario
{
    /**
     * @var integer
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $idusuario;

    /**
     * @var string $primeiroNome
     * @Column(type="string")
     */
    private $primeiroNome;

    /**
     * @var string $ultimoNome
     * @Column(type="string")
     */
    private $ultimoNome;

    /**
     * @var string $usuario
     * @Column(type="string")
     */
    private $usuario;

    
    /**
     * @var string $email
     * @Column(type="string")
     */
    private $email;
    
    /**
     * @var string $senha
     * @Column(type="string")
     */
    private $senha;

    /**
     * @var array $contas
     * @ORM\OneToMany(targetEntity="Conta", mappedBy="usuario")
     */
    private $contas;
    

    public function __construct(){
        $this->conta = new ArrayCollection();
    }

    public function setConta(ArrayCollection $contas){
        foreach ($contas as $conta) {
            $conta->setConta($conta);
        }
        $this->contas = $contas;
        return $this;
    }


    public function senhaEstaCorreta(string $senhaPura): bool{
        return password_verify($senhaPura, $this->senha);
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }



    /*public function senhaEstaCorreta(string $senhaPura): bool{
        $x = false;
        if($senhaPura === $this->senha){
            $x = true;
        }
        return $x;
    }*/
}
