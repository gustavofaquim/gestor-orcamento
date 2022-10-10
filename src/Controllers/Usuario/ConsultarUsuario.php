<?php 


namespace GenericMvc\Controllers\Usuario;

use GenericMvc\Entity\Usuario;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ConsultarUsuario implements RequestHandlerInterface{

    private $repositorioUser;

    public function __construct(EntityManagerInterface $entityManager){

        $this->repositorioUser = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface{
        $user =  $this->repositorioUser->findBy(["idusuario" => $id]);
        var_dump($user);
        return $user;
    }
}