<?php include __DIR__ . '/template/header.php'; ?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <div class="row justify-content-md-center">
            
            <h1>Bem-vindo</h1>  
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