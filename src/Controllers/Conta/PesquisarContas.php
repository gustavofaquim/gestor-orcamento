<?php 


namespace GenericMvc\Controllers\Conta;

use GenericMvc\Entity\Conta;
use GenericMvc\Entity\Usuario;
use GenericMvc\Infra\EntityManagerCreator;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;


class PesquisarContas implements RequestHandlerInterface{
   
    private $repositorioDeContas;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeContas = $entityManager->getRepository(Conta::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface{

        $idusuario = $_SESSION['user']->__get('idusuario');
        
        $contas = $this->repositorioDeContas->findBy(['usuario',$idusuario]);


        return $contas;
       
    }

   

}

