<?php 

namespace GestorOrcamento\Controllers\Usuario;

use GestorOrcamento\Entity\Usuario;
use GestorOrcamento\Helper\RenderizadorDeHtmlTrait;
use GestorOrcamento\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CadastroUsuario implements RequestHandlerInterface {
    
    use  FlashMessageTrait;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface{
        
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );
        
        
        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_SANITIZE_STRING
        );

        $senha = filter_var(
            $request->getParsedBody()['senha'],
            FILTER_SANITIZE_STRING
        );

        $usuario = new Usuario();
        $usuario->__set('email',$email);

        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $usuario->__set('senha',$senha);

        $tipo = 'success';
        if (!is_null($id) && $id !== false) {
            $usuario->__set('id',$id);
            $this->entityManager->merge($usuario);
            $this->defineMensagem($tipo, 'Curso atualizado com sucesso');
        } else {
            $this->entityManager->persist($usuario);
            $this->defineMensagem($tipo, 'Curso inserido com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/teste']);

        
    }


}