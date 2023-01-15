<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;
use GenericMvc\Models\Tipo;
use GenericMvc\Controllers\Tipo\ListarTipos;
use GenericMvc\Controllers\TipoIcone\listarTiposIcones;
use GenericMvc\Models\Icone;


class IconeDAO{

    public function listarTudo(){
        $con = new Database();

        $result = $con->executeQuery('SELECT * FROM icone');

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $icones = array();

        foreach($result as $id => $objeto){
            $icone = new Icone();

            $icone->__set('idicone');

            $tiposIconesD = new ListarTiposIcones();
            $tiposIcones = $tiposIconesD->listarTiposIcones();

            $icone->__set('idtipo');
            $icone->__set('nome');
            $icone->__set('icone');
            $icones[] = $icone;
        }
    
        return $icones;


    }
}