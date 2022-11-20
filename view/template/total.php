

<?php 

use GenericMvc\Controllers\Conta\ListarContas;
use GenericMvc\Controllers\Usuario\ConsultarUsuario;



if(isset($_SESSION['user'])){

    $usuar = new ConsultarUsuario();
    $user = $usuar->buscarUsuario($_SESSION['user']->__get('email'));
    //var_dump($user->__get('transacoes'));
    //exit();
    $x = $user->saldoTotal();
     
    echo"<div class='card-total'>";
    echo"<h3>Total</h3>";
    echo"<h4>R$".$x."</h4>";
    echo"</div>";
   
}  
   
?>