<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;
use GenericMvc\Models\Tipo;
use GenericMvc\Models\TipoIcone;


class TipoIconeDAO{

    public function listarTudo(){
        $con = new Database();

        $result = $con->executeQuery('SELECT * FROM tipo_icone');

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $tipos_icones = array();

        foreach($result as $id => $objeto){
            $icone = new Icone();

            $icone->__set('idtipo');
            $icone->__set('descricao');
            $tipos_icones[] = $tipos;
        }
    
        return $tipos_icones;


    }
}