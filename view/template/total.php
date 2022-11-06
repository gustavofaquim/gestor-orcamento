

<?php 
    
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $contas = $user->__get('contas');
    $valorTotal = 0;
    foreach($contas as $conta){ 
        $valorTotal += $conta->__get('saldo');
    }
    
   
?>

<div class="card-total">
    <h3>Total</h3>
    <h4>R$ <?= $valorTotal ?></h4>
 </div>

 <?php 
 
} // Fechamento do IF da sessão 
 
 ?>