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

class ConsultarUsuario{

    private $repositorioUser;

    public function buscarUsuario($login){

        $userDAO = new UsuarioDAO();
        
        $usuario = $userDAO->buscarPorLogin($login);

        return $usuario;

    }

    
}