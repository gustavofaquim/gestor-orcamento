<?php 


namespace GenericMvc\Controllers\Usuario;

use GenericMvc\Models\Usuario;
use GenericMvc\DAO\UsuarioDAO;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class ListaUsuarios implements RequestHandlerInterface {
   
    use RenderizadorDeHtmlTrait;

   
    public function handle (ServerRequestInterface $request): ResponseInterface{
       
        //$idusuario = $_SESSION['user']->__get('idusuario');

        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->listarTodos();
        
        $html = $this->renderizaHtml('usuario/lista.php', [
            'usuarios' => $usuarios
        ]);

        return new Response(200, [ ], $html);
    } 

}

