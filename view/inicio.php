<?php include __DIR__ . '/template/header.php'; ?>

<main class=''>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-1" style="margin-top:100px">
        <div class="row justify-content-md-center">
            
       
       <div class='pag-inicial'>
        <a href="/nova-transacao"><button type="button" class="btn btn-warning btn-add"><span>+</span></button></a>
       </div>

            <?php 
                  if(isset($_SESSION['logado'])){
                    if($_SESSION['logado'] == True){
                      $usuario = $_SESSION['user'];

                      
                    }
                }
            
            ?>

        </div>
        
      
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/template/footer.php'; ?>