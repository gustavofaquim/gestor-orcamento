<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;
use GenericMvc\Models\Conta;
use GenericMvc\Models\Categoria;
use GenericMvc\Models\Transacao;
use GenericMvc\Controllers\Conta\ListarContas;
use GenericMvc\Controllers\Categoria\ListarCategorias;
use GenericMvc\Controllers\Tipo\ListarTipos;


class TransacaoDAO{


  public function salvar(Transacao $transacao){
    
    $con = new Database();
    

    $query = 'INSERT INTO transacao (conta, tipo, categoria, valor, data, comentario) VALUES (:conta, :tipo, :categoria, :valor, :data, :comentario);';
    $stmt = $con->prepare($query);
    
    $conta = $transacao->__get('conta')->__get('idconta');
    $tipo = $transacao->__get('tipo')->__get('idtipo');
    $categoria = $transacao->__get('categoria')->__get('idcategoria');
    $valor = $transacao->__get('valor');
    $data = $transacao->__get('data');
    $comentario = $transacao->__get('comentario');

    $stmt->bindParam(':conta', $conta);
    $stmt->bindParam(':tipo',  $tipo);
    $stmt->bindParam(':categoria',  $categoria);
    $stmt->bindParam(':valor',  $valor);
    $stmt->bindParam(':data',  $data);
    $stmt->bindParam(':comentario',  $comentario);


    $result = $stmt->execute();

    //$last_id = $con->lastInsertId();

    if (!$result){
        var_dump( $stmt->errorInfo() );
        exit;
    }
    
    return $result;
  }

  public function atualizar(Transacao $transacao){

    $con = new Database();

    $idtransacao = $transacao->__get('idtransacao');
    $idconta = $transacao->__get('conta')->__get('idconta');
    $idtipo = $transacao->__get('tipo')->__get('idtipo');
    $idcategoria = $transacao->__get('categoria')->__get('idcategoria');
    $valor = $transacao->__get('valor');
    $data = $transacao->__get('data');
    $comentario = $transacao->__get('comentario');

    $query = 'UPDATE transacao SET valor = :valor, conta = :conta, tipo = :tipo, categoria = :categoria, data = :data, comentario = :comentario  WHERE idtransacao = :idtransacao';
    
    $stmt = $con->prepare($query);
     
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':conta', $idconta);
    $stmt->bindParam(':tipo', $idtipo);
    $stmt->bindParam(':categoria', $idcategoria);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->bindParam(':idtransacao',  $idtransacao);

    $result = $stmt->execute();
        
        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }
        
        return $result;


  }


  public function buscaPorConta($idconta){
    $con = new Database();

    $result = $con->executeQuery('SELECT  * FROM transacao WHERE conta = :ID', array(
      'ID' =>  $idconta
    ));

    $result = $result->fetchAll(PDO::FETCH_OBJ);

    $transacoes = array();

    $contaL = new ListarContas();
    $categoriaL = new ListarCategorias();
    $tipoL = new ListarTipos();


    foreach($result as $id => $objeto){

      $transacao = new Transacao();
      $conta = $contaL->pesquisarPorId($objeto->conta);
    
      $categoria = $categoriaL->pesquisarPorId($objeto->categoria);
      $tipo = $tipoL->pesquisarPorId($objeto->tipo);

      $transacao->__set('idtransacao', $objeto->idtransacao);
      $transacao->__set('conta', $conta);
      $transacao->__set('categoria', $categoria);
      $transacao->__set('tipo', $tipo);
      
      //var_dump("GenericMvc\DAO\TransacaoDAO");
      //var_dump($tipo);
      //exit();
      
      $transacao->__set('valor', $objeto->valor);
      $transacao->__set('data', $objeto->data);
      $transacao->__set('comentario', $objeto->comentario);

      $transacoes[] = $transacao;

    }

   
    return $transacoes;

  }
  


  public function buscarPorId($id){
    $con = new Database();

    $result = $con->executeQuery('SELECT  * FROM transacao WHERE idtransacao = :ID', array(
      'ID' =>  $id
    ));

    $objeto = $result->fetch(PDO::FETCH_OBJ);

   
    $contaL = new ListarContas();
    $categoriaL = new ListarCategorias();
    $tipoL = new ListarTipos();

    $conta = $contaL->pesquisarPorId($objeto->conta);
    
    $categoria = $categoriaL->pesquisarPorId($objeto->categoria);
    $tipo = $tipoL->pesquisarPorId($objeto->tipo);

    $transacao = new Transacao();

    $transacao->__set('idtransacao', $objeto->idtransacao);
    $transacao->__set('conta', $conta);
    $transacao->__set('categoria', $categoria);
    $transacao->__set('tipo', $tipo);
    $transacao->__set('valor', $objeto->valor);
    $transacao->__set('data', $objeto->data);
    $transacao->__set('comentario', $objeto->comentario);

    return $transacao;

  }


}
