<?php
namespace GenericMvc\Entity;
/**
 * @Entity
 * @Table(name="usuario")
 */
class Usuario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $primeiroNome;

    /**
     * @Column(type="string")
     */
    private $ultimoNome;

    
    /**
     * @Column(type="string")
     */
    private $email;
    
    /**
     * @Column(type="string")
     */
    private $senha;

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
