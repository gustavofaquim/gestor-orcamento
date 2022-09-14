<?php 

namespace GestorOrcamento\Controllers\Usuario;

use GestorOrcamento\Entity\Usuario;
use GestorOrcamento\Helper\FlashMessageTrait;
use GestorOrcamento\Helper\RenderizadorDeHtmlTrait;
use GestorOrcamento\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class FormularioEdicao implements RequestHandlerInterface{

    use RenderizadorDeHtmlTrait, FlashMessageTrait;

    private $repositorioUser;

    public function __construct(EntityManagerInterface $entityManager){
        $this->repositorioUser = $entityManager->getRepository(Usuario::class);
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

        $usuario = $this->repositorioUser->find($id);

        $html = $this->renderizaHtml('usuario/formulario.php', [
            'usuario' => $usuario
        ]);

        return new Response(200, [], $html);
    }
}