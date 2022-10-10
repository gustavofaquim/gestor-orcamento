<?php 

namespace GenericMvc\Controllers\Transacao;

use GenericMvc\Entity\Transacao;
use GenericMvc\Entity\Conta;
use GenericMvc\Controllers\Conta\ListarContas;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CadastroTransacao implements RequestHandlerInterface {
    
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
        
        
        $valor = filter_var(
            $request->getParsedBody()['valor'],
            FILTER_SANITIZE_NUMBER_FLOAT
        );

        $conta = filter_var(
            $request->getParsedBody()['conta'],
            FILTER_VALIDATE_INT
        );

        var_dump($conta);

        $categoria = filter_var(
            $request->getParsedBody()['categoria'],
            FILTER_VALIDATE_INT
        );

        $data = filter_var(
            $request->getParsedBody()['data'],
            FILTER_SANITIZE_STRING
        );

        $coment = filter_var(
            $request->getParsedBody()['coment'],
            FILTER_SANITIZE_STRING
        );
        

        $transacao = new Transacao();

        $transacao->__set('valor',$valor);

        //$contasL = new ListarContas();
        //$contaL->pesquisarPorId($conta);

        $contaC = new Conta();
        $contaC->__set('idconta', 1);
        $contaC->__set('idusuario', 2);
        $contaC->__set('nome','Santander');
        $contaC->__set('descricao','Conta Salário');
        $contaC->__set('saldo','1000');


        $transacao->__set('idconta',$contaC);
        $transacao->__set('idcategoria',$categoria);
        $transacao->__set('idtipo',1);
        $transacao->__set('data',$data);
        $transacao->__set('comentario',$coment);

        echo "<br> <br> <pre>";
        var_dump($transacao);
        echo"</pre> <br>";

        $tipo = 'success';
        if (!is_null($id) && $id !== false) {
            
            $transacao->__set('idtransacao',$id);

            $this->entityManager->merge($transacao);
            $this->defineMensagem($tipo, 'Usuário atualizado com sucesso');
        } else {
            
            $this->entityManager->persist($transacao);
            $this->defineMensagem($tipo, 'Usuário inserido com sucesso');
        }

       

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/']);

        
    }


}