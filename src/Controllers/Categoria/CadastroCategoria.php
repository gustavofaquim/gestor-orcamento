<?php 

namespace GenericMvc\Controllers\Categoria;

use GenericMvc\DAO\CategoriaDAO;
use GenericMvc\Models\Categoria;
use GenericMvc\Controllers\Usuario\ConsultarUsuario;
use GenericMvc\Helper\RenderizadorDeHtmlTrait;
use GenericMvc\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class CadastroCategoria implements RequestHandlerInterface{
    
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

        $desc = filter_var(
            $request->getParsedBody()['desc'],
            FILTER_SANITIZE_STRING
        );

        $icon = 'jfhdjhfjkdhfkdjfhdkjfhdkjfhd';


        $categoria = new Categoria();

        //$categoria->__set('usuarios', );
        $categoria->__set('descricao', $desc);
        $categoria->__set('icon', $icon);

        $categoriaDAO = new CategoriaDAO();

        $tipo = 'success';
        if (!is_null($id) && $id !== false) {
             $categoria->__set('idcategoria',$id);
             
            // $this->entityManager->merge($categoria);
             $this->defineMensagem($tipo, 'Conta atualizada com sucesso');
         } else {
            
             //$this->entityManager->persist($categoria);
             $categoriaDAO->salvar($categoria);
             $this->defineMensagem($tipo, 'Conta criada com sucesso');
         }

         $this->entityManager->flush();

         return new Response(302, ['Location' => '/']);
    }
}