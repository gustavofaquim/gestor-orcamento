<?php

namespace GenericMvc\Controllers;

//use GenericMvc\Entity\Usuario;
use GenericMvc\Models\Usuario;
use GenericMvc\Controllers\Usuario\ConsultarUsuario;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizaLogin implements RequestHandlerInterface{

    use FlashMessageTrait;

    private $repositorioDeUsuarios;

   /* public function __construct(EntityManagerInterface $entityManager){
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    } */

    public function handle(ServerRequestInterface $request): ResponseInterface{
        $login = filter_var(
            $request->getParsedBody()['email'],
            FILTER_SANITIZE_STRING
        );
        

        $redirecionamentoLogin = new Response(302, ['Location' => '/login']);
        if (is_null($login) || $login === false) {
            $this->defineMensagem(
                'danger',
                'O e-mail digitado não é um e-mail válido.'
            );

            return $redirecionamentoLogin;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        

        //$usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $email]);
        $usuarioC = new ConsultarUsuario();
        $usuario = $usuarioC->buscarUsuario($login);
        

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', 'E-mail ou senha inválidos');
            var_dump('E-mail ou senha inválidos');
            exit();
            return $redirecionamentoLogin;
        }
        //var_dump($usuario);
        //exit();
        $_SESSION['logado'] = true;
        if(!isset($_SESSION['user'])){
            $_SESSION['user'] = $usuario;
        }

        return new Response(302, ['Location' => '/']);
    }

}