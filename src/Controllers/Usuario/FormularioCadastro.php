<?php 

namespace GestorOrcamento\Controllers\Usuario;

use GestorOrcamento\Entity\Usuario;
use GestorOrcamento\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class FormularioCadastro implements RequestHandlerInterface{
   
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface{
        $html = $this->renderizaHtml('usuario/formulario.php',[]);

        return new Response(200, [], $html);
    }
}