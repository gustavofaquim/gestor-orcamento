<?php 

namespace GenericMvc\Controllers\Usuario;

use GenericMvc\Entity\Usuario;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
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
        
        
        $primeiroNome = filter_var(
            $request->getParsedBody()['primeiroNome'],
            FILTER_SANITIZE_STRING
        );

        $ultimoNome = filter_var(
            $request->getParsedBody()['ultimoNome'],
            FILTER_SANITIZE_STRING
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

        $usuario->__set('primeiroNome',$primeiroNome);
        $usuario->__set('ultimoNome',$ultimoNome);
        $usuario->__set('email',$email);

        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $usuario->__set('senha',$senha);

        $tipo = 'success';
        if (!is_null($id) && $id !== false) {
            $usuario->__set('id',$id);
            $this->entityManager->merge($usuario);
            $this->defineMensagem($tipo, 'Usuário atualizado com sucesso');
        } else {
            $this->entityManager->persist($usuario);
            $this->defineMensagem($tipo, 'Usuário inserido com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/']);

        
    }


}