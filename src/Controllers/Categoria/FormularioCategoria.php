<?php 

namespace GenericMvc\Controllers\Categoria;

use GenericMvc\Entity\Categoria;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class FormularioCategoria implements RequestHandlerInterface{
   
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface{
        $html = $this->renderizaHtml('categoria/formulario.php',[]);

        return new Response(200, [], $html);
    }
}