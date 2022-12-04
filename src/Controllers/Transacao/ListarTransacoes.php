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

    public function listarTransacoesMes(){
        $idusuario = $_SESSION['user']->idusuario;

        $transacaoD = new TransacaoDAO();
        $contaL = new ListarContas();
        $contas = $contaL->listarContasUsuarioLogado();

        $transacoes = array();

        foreach($contas as $conta){
            $idconta = $conta->__get('idconta');
            $transacoes[] = $transacaoD->listarPorConta($idconta);
        }
        
        
        foreach($transacoes as $transacao){
            foreach($transacao as $trans){
                $mes = (new DateTime($trans->__get('data')))->format('m');
                if($mes == date('m') ){
                    $result[] =  $trans;
                }
            }
            
        }
        return $result;
    
    }

    public function listarTransacoesAno(){
        $idusuario = $_SESSION['user']->idusuario;

        $transacaoD = new TransacaoDAO();
        $contaL = new ListarContas();
        $contas = $contaL->listarContasUsuarioLogado();

        $transacoes = array();

        foreach($contas as $conta){
            $idconta = $conta->__get('idconta');
            $transacoes[] = $transacaoD->listarPorConta($idconta);
        }
        
        $result = array();
        foreach($transacoes as $transacao){
            $x = 0;
            $cont = 0;
            $aux = $transacao[$cont];
            $valor = 0;
            
         

            foreach($transacao as $trans){
                var_dump($trans);
               
                $mes = (new DateTime($trans->__get('data')))->format('Y');
                if($mes == date('Y') ){
                    $cont++;

                   // Somando os valores dos itens da mesma categoria
                   if($aux->__get('categoria')->__get('idcategoria') == $trans->__get('categoria')->__get('idcategoria')){
                        $valor += $trans->__get('valor');
                        $posic = $trans->__get('id');
                        $x++;
                   }
                   if($x > 1){
                    $aux->__set('valor', $valor);
                   
                    unset($result[array_search('["idtransacao":"GenericMvc\Models\Transacao":private]=> int('.$posic.')',$result)]);
                   
                   
                    $x = 0;
                    
                    $result[] = $aux;
                    break;

                   }
                    $result[] =  $trans;
                }
            }
            
        }
        return $result;
    
    }

    public function listarTransacoesPorConta($idconta){

        $transacaoD = new TransacaoDAO();
        $transacao = $transacaoD->listarPorConta($idconta);
        //echo "GenericMvc\Controllers\Transacao\ListarTransacoes.php ----------------------  <br>";
        //var_dump($transacao);
        //exit();
        return $transacao;
    }

   public function buscarPorId($id){

        $transacaoD = new TransacaoDAO();
        $transacao = $transacaoD->buscarPorId($id);

        return $transacao;
   }


}

