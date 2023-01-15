<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;
use GenericMvc\Models\Conta;

class ContaDAO{


    public function salvar(Conta $conta){
        $con = new Database();

        $query = "insert into conta (usuario, nome, descricao,saldo) values (:user, :nome, :descricao, :saldo)";
        $stmt = $con->prepare($query);
        
        $user = $conta->__get('usuario')->__get('idusuario');
        $nome = $conta->__get('nome');
        $descricao = $conta->__get('descricao');
        $saldo = $conta->__get('saldo');

        

        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':saldo', $saldo);
        
        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }
        
        return $result;
        
    }

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

           // var_dump($contas);
            
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

    public function atualizar(Conta $conta){

        $con = new Database();
        
        $idconta = $conta->__get('idconta');
        $saldo = $conta->__get('saldo');

        $query = 'UPDATE conta SET saldo = :saldo WHERE idconta = :idconta';
        
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':saldo', $saldo);
        $stmt->bindParam(':idconta',  $idconta);

        $result = $stmt->execute();
        
        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }
        
        return $result;

    }
}