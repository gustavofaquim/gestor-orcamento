<?php include __DIR__ . '/../template/header.php'; ?>

<main>
  <div class="container-fluid">
    <div class='formTransacao'>


        <form action="/cadastrar-categoria<?= isset($categoria) ? '?id= ' . $categoria->__get('idcategoria') : ''; ?>" class='' method="post">
                
            
            <div class="form-group div-conta">
                <label for="nome">Descrição</label>
                <input type="text" class="form-control" id="desc" name='desc' value="<?= isset($categoria) ? $categoria->__get('descricao'): ''; ?>">
            </div>

            
            <div class="form-group div-conta form-check">
            <?php
            
            if(isset($tipostransacao)){
              foreach($tipostransacao as $tipo){
                
                if(isset($categoria) AND $categoria->__get('tipotransacao')->__get('idtipo') == $tipo->__get('idtipo')){
                  echo "<input class='form-check-input' type='radio' name='tipo' id='tipo' value='".$tipo->idtipo."'checked>";
                }else{
                  echo "<input class='form-check-input' type='radio' name='tipo' id='tipo' value='".$tipo->idtipo."'";
                }
                
                echo "<label class='form-check-label' for='tipo'>".$tipo->__get('descricao')."</label> <br>"; 
              }
            }
            ?>
            </div>
            
            
            

            <div class="form-group div-conta">
                <label for="nome">Icon</label> <br>
                <div id='icon-categoria' style="background-color: <?= isset($categoria) ? $categoria->__get('cor'): ''; ?>">
                  <i class="<?= isset($categoria) ? $categoria->__get('icon'): ''; ?>"></i>
                </div>
                
                <input type="hidden" class="form-control" id="desc" name='desc' value="<?= isset($categoria) ? $categoria->__get('icon'): ''; ?>">
            </div>

            
            <button type="submit" class="btn btn-warning btn-add">Salvar</button>
        </form>


    </div>
           
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>