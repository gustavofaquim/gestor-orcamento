<?php 

namespace GenericMvc\DAO;

use GenericMvc\DAO\Database;
use PDO;
use GenericMvc\Models\Usuario;
use GenericMvc\Models\Categoria;


class CategoriaDAO{


  public function salvar(Categoria $categoria){
    
    $con = new Database();
    

    $query = 'INSERT INTO categoria (descricao, icon, cor) VALUES (:descricao, :icon, :cor);';
    $stmt = $con->prepare($query);
    
    $descricao = $categoria->__get('descricao');
    $icon = $categoria->__get('icon');
    $cor = $categoria->__get('cor');

    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':icon',  $icon);
    $stmt->bindParam(':cor',  $cor);


    $result = $stmt->execute();

    $last_id = $con->lastInsertId();
   // echo("<h1>".$last_id."</h1>");
    
    
    $query2 = 'INSERT INTO usuario_categoria (idusuario, idcategoria) VALUES (:iduser, :idcategoria);';
    
    $stmt2 = $con->prepare($query2);

    $iduser = $_SESSION['user']->idusuario;
    
    $stmt2->bindParam(':iduser', $iduser);
    $stmt2->bindParam(':idcategoria',  $last_id);

    $result2 = $stmt2->execute();
    

    if (!$result2){
        var_dump( $stmt2->errorInfo() );
        exit;
    }
    
    return $result2;
  }


  public function listarPorUsuario($idusuario){
    
    $con = new Database();

    $result = $con->executeQuery('SELECT * FROM categoria');

    $result = $result->fetchAll(PDO::FETCH_OBJ);

    $categorias = array();

    foreach($result as $id => $objeto){
      
      $categoria = new Categoria();

      $categoria->__set('idcategoria', $objeto->idcategoria);
      $categoria->__set('descricao', $objeto->descricao);
      $categoria->__set('icon',$objeto->icon);
      $categoria->__set('cor',$objeto->cor);

      $categorias[] = $categoria;
    }

    return $categorias;
  }


  public function buscarPorId($id){
     
    $con = new Database();

    $result = $con->executeQuery('SELECT * FROM categoria WHERE idcategoria = :ID', array(
      'ID' => $id
    ));

    $objeto = $result->fetch(PDO::FETCH_OBJ);

   //var_dump($objeto);

    $categoria = new Categoria();
    //$usuario = new UsuarioDAO();

    $categoria->__set('idcategoria', $objeto->idcategoria);
    $categoria->__set('descricao', $objeto->descricao);
    $categoria->__set('icon', $objeto->icon);
    $categoria->__set('cor',$objeto->cor);
    
   // $user = $usuario->buscarPorId($objeto->usuario);

    //$conta->__set('usuario', $user);

    return $categoria;
  }


    
    
}