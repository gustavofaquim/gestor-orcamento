<?php 

namespace GenericMvc\Controllers\Conta;

use GenericMvc\Entity\Usuario;
use GenericMvc\Entity\Conta;
use GenericMvc\Controllers\Usuario\ConsultarUsuario;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class CadastroConta implements RequestHandlerInterface{
    
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
        
        
        $saldo = filter_var(
            $request->getParsedBody()['saldo'],
            FILTER_SANITIZE_NUMBER_FLOAT
        );


        $nome = filter_var(
            $request->getParsedBody()['nome'],
            FILTER_SANITIZE_STRING
        );

        $descricao = filter_var(
            $request->getParsedBody()['desc'],
            FILTER_SANITIZE_STRING
        );

        
        $user = new Usuario();
        
        $respositoUser = $this->entityManager->getRepository(Usuario::class);
        $userC = $respositoUser->find(["idusuario" => 1]);

        
        
       
        

        $conta = new Conta();

        $conta->__set('saldo', $saldo);
        $conta->__set('usuario', $userC);
        $conta->__set('nome', $nome);
        $conta->__set('descricao', $descricao);
       

        $tipo = 'success';
       if (!is_null($id) && $id !== false) {
            $conta->__set('idconta',$id);
            $this->entityManager->merge($conta);
            $this->defineMensagem($tipo, 'Conta atualizada com sucesso');
        } else {
            
            $this->entityManager->persist($conta);
            $this->defineMensagem($tipo, 'Conta criada com sucesso');
        }

        echo "<pre>";
            var_dump($conta);
        echo "</pre>";
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/']);

    }
}