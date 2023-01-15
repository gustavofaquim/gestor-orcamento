<?php 

namespace GenericMvc\Controllers\Categoria;

use GenericMvc\Entity\Categoria;
use GenericMvc\Controllers\Tipo\ListarTipos;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioCategoria implements RequestHandlerInterface{
   
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface{
        
        $listarTipos = new ListarTipos();
        $tipos = $listarTipos->listarTodos();

        $listarIcons = new ListarIcones();
        $icones = 
        
        
        $html = $this->renderizaHtml('categoria/formulario.php',[
            'tipostransacao' => $tipos
        ]);

        return new Response(200, [], $html);
    }
}