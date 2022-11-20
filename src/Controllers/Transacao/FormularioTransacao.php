<?php 

namespace GenericMvc\Controllers\Transacao;

use GenericMvc\Entity\Usuario;
use GenericMvc\Controllers\Conta\ListarContas;  
use GenericMvc\Controllers\Categoria\ListarCategorias;
use GenericMvc\Controllers\Conta\PesquisarContas;
use GenericMvc\Controllers\Tipo\ListarTipos;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;


class FormularioTransacao implements RequestHandlerInterface{
   
    use RenderizadorDeHtmlTrait;


    public function handle(ServerRequestInterface $request): ResponseInterface{

        $idusuario = $_SESSION['user']->__get('idusuario');
        
        
        
        

        $tipotransacao = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );
       

        // Lista as Contas
        $contasC = new ListarContas();
        $contas = $contasC->listarContasUsuarioLogado();

        // Listas os Tipos
        $tiposC = new ListarTipos();
        $tipos = $tiposC->listarTodos();
        
        // Listas as Cateogiras
        $categoriasC = new ListarCategorias();
        $categorias = $categoriasC->listarCategoriasPorUsuario();
        
       
        $html = $this->renderizaHtml('transacao/formulario.php',[
            'contas' => $contas,
            'categorias' => $categorias,
            'tipos' => $tipos
        ]);

        return new Response(200, [], $html);
    }
}