<?php 


namespace GenericMvc\Controllers\Transacao;


use GenericMvc\Entity\Usuario;
use GenericMvc\Models\Conta;
use GenericMvc\DAO\TransacaoDAO;
use GenericMvc\Controllers\Conta\ListarContas;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Datetime;


class ListarTransacoes implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;

    private $repositorioDeContas;

    public function __construct(){}

   
    public function handle (ServerRequestInterface $request): ResponseInterface{
       
        $idusuario = $_SESSION['user']->idusuario;

        $transacaoD = new TransacaoDAO();
        $transacoes = $transacaoD->listarPorUsuario($idusuario);

        $html = $this->renderizaHtml('inicio.php', [
            
            'transacoes' => $transacoes
        ]);

        return new Response(200, [ ], $html);
    }
    
    public function listarTransacoes(){
       
        $idusuario = $_SESSION['user']->idusuario;

        $transacaoD = new TransacaoDAO();
        $contaL = new ListarContas();
        $contas = $contaL->listarContasUsuarioLogado();

        $transacoes = array();

        foreach($contas as $conta){
            $idconta = $conta->__get('idconta');
            $transacoes[] = $transacaoD->listarPorConta($idconta);
        }
        return $transacoes;
    }

    public function listarTransacoesPorConta($idconta){

        $transacaoD = new TransacaoDAO();
        $transacao = $transacaoD->listarPorConta($idconta);
        //echo "GenericMvc\Controllers\Transacao\ListarTransacoes.php ----------------------  <br>";
        //var_dump($transacao);
        //exit();
        return $transacao;
    }

    public function listarTransacoesPorData($x){



       

      return null;
    }

}

