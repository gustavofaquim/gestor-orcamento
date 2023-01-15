<?php 


namespace GenericMvc\Controllers\TipoIcone;

use GenericMvc\Models\TipoIcone;
use GenericMvc\DAO\TipoIconeDAO;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListarTiposIcones implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;


    public function listarTiposIcones(){

        $tiposIconesD = TiposIconesDAO();
        $tiposIcones = $tiposIconesD->listarTudo();

        return $tiposIcones;
    }

}