<?php

namespace GenericMvc\Controllers\Categoria;


use GenericMvc\Entity\Categoria;
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

    public function __construct(EntityManagerInterface $entityManager){
        $this->repositorioCategoria = $entityManager->getRepository(Categoria::class);
    }


    public function handle(ServerRequestInterface $request): ResponseInterface{
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        
        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'ID de curso inválido');
            return $resposta;
        }

        $categoria = $this->repositorioCategoria->find($id);

        $html = $this->renderizaHtml('categoria/formulario.php', [
            'categoria' => $categoria,
        ]);

        return new Response(200, [], $html);
    }
}
