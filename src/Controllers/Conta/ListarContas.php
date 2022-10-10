<?php 


namespace GenericMvc\Controllers\Conta;

use GenericMvc\Entity\Conta;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListarContas implements RequestHandlerInterface {
   
    private $repositorioDeContas;

    public function __construct(EntityManagerInterface $entityManager){
        
        $this->repositorioDeContas = $entityManager->getRepository(Conta::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface{
        $conta =  $this->repositorioDeContas->findBy(["idconta" => $id]);
        var_dump("Entrou aqui". $conta);

        return $conta; 
    }

    public function pesquisarPorId($id){
       $conta =  $this->repositorioDeContas->findBy(["idconta" => $id]);

        return $conta; 
    }
}

