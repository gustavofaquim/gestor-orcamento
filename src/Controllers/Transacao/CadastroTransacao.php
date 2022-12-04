<?php 

namespace GenericMvc\Controllers\Transacao;

use GenericMvc\Entity\Conta;
use GenericMvc\DAO\TransacaoDAO;
use GenericMvc\Models\Transacao;
use GenericMvc\Models\Tipo; 
use GenericMvc\Controllers\Conta\ListarContas;
use GenericMvc\Controllers\Conta\CadastroConta;
use GenericMvc\Controllers\Tipo\ListarTipos;
use GenericMvc\Controllers\Categoria\ListarCategorias;
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

        $idtipo = filter_var(
            $request->getParsedBody()['idtipo'],
            FILTER_VALIDATE_INT
        );
        
        
        $valor = filter_var(
            $request->getParsedBody()['valor'],
            FILTER_SANITIZE_STRING
        );

        $idconta = filter_var(
            $request->getParsedBody()['conta'],
            FILTER_VALIDATE_INT
        );


        $idcategoria = filter_var(
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

        $transacao->__set('valor', floatval($valor));

        $contaL = new ListarContas();
        $conta = $contaL->pesquisarPorId($idconta);
      
        $categoriaL = new ListarCategorias();
        $categoria = $categoriaL->pesquisarPorId($idcategoria);
        
        $tipoL = new ListarTipos();
        $tipo = $tipoL->pesquisarPorId($idtipo);

        $transacao->__set('conta',$conta);
        $transacao->__set('categoria',$categoria);
        $transacao->__set('tipo',$tipo);
        $transacao->__set('data',$data);
       
        $transacao->__set('comentario',$coment);

        $transacaoDAO = new TransacaoDAO();

        $tipo = 'success';
       
        if (!is_null($id) && $id !== false) {
            $transacao->__set('idtransacao',$id);
            $transacaoDAO->atualizar($transacao);
            $this->defineMensagem($tipo, 'Atualizado com sucesso :> ');
        } else {
            
            $transacaoDAO->salvar($transacao);
            $this->defineMensagem($tipo, 'Inserido com sucesso :> ');


            // Quando cadastrar transacao atualizar o saldo da conta
            $novoSaldo = $conta->atualizarSaldo($transacao->__get('valor'), $transacao->__get('tipo'));
            $contaC = new CadastroConta();
            $conta = $contaC->atualizar($conta, $novoSaldo);

            
        }


        $this->entityManager->flush();

        return new Response(302, ['Location' => '/']);

        
    }


}