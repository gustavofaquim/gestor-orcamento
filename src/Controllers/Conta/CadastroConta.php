<?php 

namespace GenericMvc\Controllers\Conta;

use GenericMvc\Entity\Usuario;
use GenericMvc\Models\Conta;
use GenericMvc\DAO\ContaDAO;
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
        $usuario = $_SESSION['user'];
        
        //$respositoUser = $this->entityManager->getRepository(Usuario::class);
        //$userC = $respositoUser->find(["idusuario" => 1]);
    
        $conta = new Conta();

        $conta->__set('saldo', $saldo);
        $conta->__set('usuario', $usuario);
        $conta->__set('nome', $nome);
        $conta->__set('descricao', $descricao);
       
        $contaDAO = new ContaDAO();

        $tipo = 'success';
        if (!is_null($id) && $id !== false) {
                $conta->__set('idconta',$id);
                $this->entityManager->merge($conta);
                $this->defineMensagem($tipo, 'Conta atualizada com sucesso');
        } else {
                
                //$this->entityManager->persist($conta);
                $contaDAO->salvar($conta);
                //$this->defineMensagem($tipo, 'Conta criada com sucesso');
        }

        //$this->entityManager->flush();

        return new Response(302, ['Location' => '/']);

    }

    public function atualizar($cont, $valor){

        
        // Inserindo o novo Saldo
        $cont->__set('saldo', $valor);

        $contaD = new ContaDAO();        
        $conta = $contaD->atualizar($cont);

        return $conta;
    }
}