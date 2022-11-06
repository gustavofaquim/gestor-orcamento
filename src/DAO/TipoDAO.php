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


        $tipo->__set('idconta', $objeto->idtipo);
        $tipo->__set('nome', $objeto->descricao);
        

        return $tipo;
      }
}