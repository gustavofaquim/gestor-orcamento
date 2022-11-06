<?php 


namespace GenericMvc\Controllers\Conta;

use GenericMvc\Entity\Conta;
//use GenericMvc\Entity\Usuario;
use GenericMvc\Models\Usuario;
use GenericMvc\DAO\ContaDAO;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListarContas implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;

    private $repositorioDeContas;

    public function __construct(){}

   
    public function handle (ServerRequestInterface $request): ResponseInterface{
       
        $idusuario = $_SESSION['user']->idusuario;

        $contaD = new ContaDAO();
        $contas = $contaD->listarPorUsuario($idusuario);

        $html = $this->renderizaHtml('conta/lista.php', [
            
            'contas' => $contas
        ]);

        return new Response(200, [ ], $html);
    } 

    public function listarContasUsuarioLogado(){
        
        $idusuario = $_SESSION['user']->idusuario;
        
        $contaD = new ContaDAO();
        $contas = $contaD->listarPorUsuario($idusuario);
       
        return $contas;
    }

    public function listarContasPorUsuario($idusuario){
        
        $contaD = new ContaDAO();
        $contas = $contaD->listarPorUsuario($idusuario);
       
        return $contas;
    }

    public function pesquisarPorId($id){
        
        $contaD = new ContaDAO();
        $conta = $contaD->buscarPorId($id);

        return $conta;
    }

}

