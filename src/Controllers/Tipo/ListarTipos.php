<?php 


namespace GenericMvc\Controllers\Tipo;

use GenericMvc\DAO\TipoDAO;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListarTipos implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;

    private $repositorioTipos;

    

    public function handle (ServerRequestInterface $request): ResponseInterface{
        
       
    }
    
   
    public function pesquisarPorId($id){
        $tipoDAO = new TipoDAO();
        $tipo = $tipoDAO->buscarPorId($id);

        return $tipo;
    }

}

