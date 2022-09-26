<?php 

namespace GenericMvc\Controllers;

use GenericMvc\Entity\Usuario;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class FormularioLogin implements RequestHandlerInterface {

    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface{
        $html = $this->renderizaHtml('login/formulario.php', []);

        return new Response(200, [], $html);
    }

}
