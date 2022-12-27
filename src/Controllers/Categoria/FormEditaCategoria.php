<?php

namespace GenericMvc\Controllers\Categoria;

use GenericMvc\Models\Categoria;
use GenericMvc\Controllers\Tipo\ListarTipos;
use GenericMvc\Controllers\Categoria\ListarCategorias;
use GenericMvc\Helper\FlashMessageTrait;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditaCategoria implements RequestHandlerInterface{

    use RenderizadorDeHtmlTrait, FlashMessageTrait;
    
    private $repositorioCategoria;


    public function handle(ServerRequestInterface $request): ResponseInterface{
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        
        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'ID de curso inválido');
            return $resposta;
        }

        //$categoria = new Categoria();
        $listarCategorias = new ListarCategorias();
        $categoria = $listarCategorias->pesquisarPorId($id);

        $listarTipos = new ListarTipos();
        $tipos = $listarTipos->listarTodos();

        //$categoria = $this->repositorioCategoria->find($id);

        $html = $this->renderizaHtml('categoria/formulario.php', [
            'categoria' => $categoria,
            'tipostransacao' => $tipos
        ]);

        return new Response(200, [], $html);
    }
}
