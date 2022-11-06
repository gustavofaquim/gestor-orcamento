<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;

class UsuarioDAO{


    public function listarTodos(){
        
        $con = new Database();

        $result = $con->executeQuery('select * from usuario');

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $posts = array();

        $usuarios = Array();

        foreach($result as $id => $objeto){

            $usuario = new Usuario();
            
           $usuario->__set('idusuario', $objeto->idusuario);
           $usuario->__set('primeiroNome', $objeto->primeiroNome);
           $usuario->__set('ultimoNome', $objeto->ultimoNome);
           $usuario->__set('usuario', $objeto->usuario);
           $usuario->__set('email', $objeto->email);
           $usuario->__set('senha', $objeto->senha);

           $usuarios[] = $usuario;
        }

        return $usuarios;
    }


    public function buscarPorId($idusuario): Usuario{
        $con = new Database();

        $result = $con->executeQuery('select * from usuario where idusuario = :ID', array(
            'ID' => $idusuario
        ));

        $objeto = $result->fetch(PDO::FETCH_OBJ);

        $usuario = new Usuario();

        $usuario->__set('idusuario', $objeto->idusuario);
        $usuario->__set('primeiroNome', $objeto->primeiroNome);
        $usuario->__set('ultimoNome', $objeto->ultimoNome);
        $usuario->__set('usuario', $objeto->usuario);
        $usuario->__set('email', $objeto->email);
        $usuario->__set('senha', $objeto->senha);


        return $usuario;
    }

    public function buscarPorLogin($login){
        $con = new Database();

        $result = $con->executeQuery('select * from usuario where email = :email or usuario = :user', array(
            'email' => $login,
            'user' => $login
        ));

        $objeto = $result->fetch(PDO::FETCH_OBJ);

        $usuario = new Usuario();

        $usuario->__set('idusuario', $objeto->idusuario);
        $usuario->__set('primeiroNome', $objeto->primeiroNome);
        $usuario->__set('ultimoNome', $objeto->ultimoNome);
        $usuario->__set('usuario', $objeto->usuario);
        $usuario->__set('email', $objeto->email);
        $usuario->__set('senha', $objeto->senha);

        return $usuario;
    }
}
