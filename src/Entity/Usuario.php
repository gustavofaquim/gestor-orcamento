<?php
namespace GestorOrcamento\Entity;
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
    private $email;
    /**
     * @Column(type="string")
     */
    private $senha;

    /*public function senhaEstaCorreta(string $senhaPura): bool{
        return password_verify($senhaPura, $this->senha);
    }/*

    /*public function senhaEstaCorreta(string $senhaPura): bool{
        $x = false;
        if($senhaPura === $this->senha){
            $x = true;
        }
        return $x;
    }*/
}