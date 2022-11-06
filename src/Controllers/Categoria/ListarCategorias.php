<?php 


namespace GenericMvc\Controllers\Categoria;

use GenericMvc\Entity\Categoria;
use GenericMvc\DAO\CategoriaDAO;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListarCategorias implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;

    private $repositorioCategorias;

    

    public function handle (ServerRequestInterface $request): ResponseInterface{
        
        $categoriaD = new CategoriaDAO();
        $categorias = $categoriaD->listarPorUsuario($idusuario);
        
        $html = $this->renderizaHtml('categoria/lista.php', [
            'categorias' => $categorias
        ]);
        return new Response(200, [ ], $html);
    }
    
    public function listarCategoriasPorUsuario(){

        $idusuario = $_SESSION['user']->idusuario;
        
        $categoriaD = new CategoriaDAO();
        $categorias = $categoriaD->listarPorUsuario($idusuario);
        
        return $categorias;
    }

    public function pesquisarPorId($id){
        $categoriaDAO = new categoriaDAO();
        $categoria = $categoriaDAO->buscarPorId($id);

        return $categoria;
    }

}

