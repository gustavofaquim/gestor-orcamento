<?php 


namespace GenericMvc\Controllers\Icone;

use GenericMvc\Entity\Categoria;
use GenericMvc\DAO\CategoriaDAO;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListarIcones implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;

    private $repositorioCategorias;



    public function listarIcones(){

        $iconesD = IconesDAO();
        $icones = $iconesD->listarTudo();

        return $icones;
    }

}