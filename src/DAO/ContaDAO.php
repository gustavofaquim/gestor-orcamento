<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;
use GenericMvc\Models\Conta;

class ContaDAO{

    public function listarPorUsuario($idusuario){
       
        $con = new Database();
        
        $result = $con->executeQuery('SELECT * FROM conta WHERE usuario = :ID', array(
            'ID' => $idusuario
        ));

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $contas = array();
        $usuario = new UsuarioDAO();

        foreach($result as $id => $objeto){
            
            $conta = new Conta();
        
            $conta->__set('idconta', $objeto->idconta);
            $conta->__set('nome', $objeto->nome);
            $conta->__set('descricao', $objeto->descricao);
            $conta->__set('saldo', $objeto->saldo);
            
            $user = $usuario->buscarPorId($objeto->usuario);
            
            
            $conta->__set('usuario', $user);

            $contas[] = $conta;
            
        }

        return $contas;

        
    }

    public function buscarPorId($id){
     
        $con = new Database();
    
        $result = $con->executeQuery('SELECT * FROM conta WHERE idconta = :ID', array(
          'ID' => $id
        ));

        $objeto = $result->fetch(PDO::FETCH_OBJ);

       //var_dump($objeto);

        $conta = new Conta();
        $usuario = new UsuarioDAO();

        $conta->__set('idconta', $objeto->idconta);
        $conta->__set('nome', $objeto->nome);
        $conta->__set('descricao', $objeto->descricao);
        $conta->__set('saldo', $objeto->saldo);
        
        $user = $usuario->buscarPorId($objeto->usuario);

        $conta->__set('usuario', $user);

        return $conta;
      }
}