<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Tipo;

class TipoDAO{


    public function buscarPorId($id){
     
        $con = new Database();
    
        $result = $con->executeQuery('SELECT * FROM tipo_transacao WHERE idtipo = :ID', array(
          'ID' => $id
        ));

        $objeto = $result->fetch(PDO::FETCH_OBJ);


        $tipo = new Tipo();


        $tipo->__set('idtipo', $objeto->idtipo);
        $tipo->__set('descricao', $objeto->descricao);
        

        return $tipo;
      }

      public function listarTodos(){

        $con = new Database();

        $result = $con->executeQuery('SELECT  * FROM tipo_transacao');
    
        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $tipos = array();

       

        foreach($result as $id => $objeto){

          $tipo = new Tipo();

          $tipo->__set('idtipo', $objeto->idtipo);
          $tipo->__set('descricao', $objeto->descricao);

          $tipos[] = $tipo;
        }
       
        return $tipos;
      }
}