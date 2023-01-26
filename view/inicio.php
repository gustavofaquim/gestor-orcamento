<?php include __DIR__ . '/template/header.php';?>

<main class=''>
  <div class="container-fluid">
    <div class="row">
      <div class="">
        <div class="row justify-content-md-center">
            
       
       <div class='pag-inicial'>
        <a href="nova-transacao"><button type="button" class="btn btn-warning btn-add"><span>+</span></button></a>
       </div>

        <?php 
        
          if(isset($_SESSION['logado'])){
            if($_SESSION['logado'] == True){
              $usuario = $_SESSION['user'];
             

            }
          } 
 
        ?>
       
        <div class="transacoes">

            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item  accordionOne">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Dia
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <h1><?php echo date('d') . ' de ' . date('F')  ?> </h1>  
               
                  <?php foreach ($transacoes as $transacao): ?>
                    <?php foreach ($transacao as $trans): ?>
                      <?php    
                              
                              $m = (new DateTime($trans->__get('data')))->format('d');
                          
                              if($m == date('d')){
                                
                                
                                echo "<div class='accordion-body'>";
                                echo"<a href='atualiza-transacao?id=".$trans->__get('idtransacao')."'> <div class='ln-descricao'><i class='".$trans->__get('categoria')->__get('icon')."' style='background-color:".$trans->__get('categoria')->__get('cor')."'></i> <span class='categoria'>".$trans->__get('categoria')->__get('descricao'). "</span> <span class='valor'> R$".$trans->__get('valor')."</span></div> </a>";
                                echo"</div>";
                              }

                            ?>
                    <?php endforeach; ?>   
                  <?php endforeach; ?>  
                </div>
              </div>
            </div>
          
                              
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item accordionTwo">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Mês
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <h1><?= date('F')?>, <?= date('m') ?> </h1>

                  <?php foreach ($transacoesM as $trans): ?>
                      <?php    
                              
                        echo "<div class='accordion-body'>";
                        echo"<a href='atualiza-transacao/".$trans->__get('idtransacao')."'> <div class='ln-descricao'><i class='".$trans->__get('categoria')->__get('icon')."' style='background-color:".$trans->__get('categoria')->__get('cor')."'></i> <span class='categoria'>".$trans->__get('categoria')->__get('descricao'). "</span> <span class='valor'> R$".$trans->__get('valor')."</span></div></a>";
                        echo"</div>";
                              
                                
                      ?>   
                  <?php endforeach; ?>  
                </div>
              </div>
            </div>


            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item accordionThree">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  Ano
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <h1><?= date('Y') ?> </h1>            
                  <?php foreach ($transacoesY as $trans): ?>
                      <?php    
                              
                          echo "<div class='accordion-body'>";
                            echo"<a href='atualiza-transacao?id=".$trans['idtransacao']."'> <div class='ln-descricao'><i class='".$trans['icon']."' style='background-color:".$trans['cor']."'></i> <span class='categoria'>".$trans['descricao']. "</span> <span class='valor'> R$".$trans['valor']."</span></div></a>";
                          echo"</div>";
                        
                          
                      ?>
                    
                  <?php endforeach; ?>  
                </div>
              </div>
            </div>
        </div> <!--  FIM Transacoes -->


      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/template/footer.php'; ?>