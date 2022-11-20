<?php include __DIR__ . '/../template/header.php'; ?>

<main>
  <div class="container-fluid">
    <div class='formTransacao'>

     
        
        <form action="/cadastrar-transacao<?= isset($usuario) ? '?id= ' . $usuario->__get('id') : ''; ?>" class='' method="post">
            
            
            <?php foreach ($tipos as $tipo): ?>

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item  <?php echo "accordion".$tipo->__get('descricao'); ?> accordionDespesa">
                        <h2 class="accordion-header" id="panelsStayOpen-headingDespesa">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo'#collapse',$tipo->__get('descricao')?>" aria-expanded="true" aria-controls="<?php echo'collapse',$tipo->__get('descricao')?>">
                            <?= $tipo->__get('descricao') ?>
                        </button>
                        </h2>
                        <div id="<?php echo'collapse',$tipo->__get('descricao') ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingDespesa">
                            <div class='accordion-body'>

                                <div class="form-group div-valor">
                                    <label for="valor">R$</label>
                                    <input type="text" class="form-control" id="valor" name='valor' placeholder="0" value="<?= isset($usuario) ? $usuario->__get('primeiroNome'): ''; ?>">
                                </div>

                                <div class="form-group div-conta">
                                    <label for="conta">Conta</label>
                                        <select class="form-control" id="conta" name='conta'>
                                        <?php 
                                            
                                            foreach ($contas as $conta){
                                                echo "<option value='".$conta->__get('idconta')."'>".$conta->__get('nome')."</option>"; 
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group div-conta">
                                    <label for="categoria">Categoria</label>
                                    
                                        <select class="form-control" id="categoria" name="categoria">
                                        <?php 
                                        
                                            foreach ($categorias as $categoria){
                                               
                                                if($categoria->__get('tipotransacao')->__get('idtipo') == $tipo->__get('idtipo')){
                                                    echo "<option value='".$categoria->__get('idcategoria')."'> <p><i class='".$categoria->__get('icon')."'></i> ".$categoria->__get('descricao')."</p></option>"; 
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group div-coment">
                                    <label for="data">Data da Transação</label>
                                    <input type="date" class="form-control" id="data" name='data' value="<?= isset($usuario) ? $usuario->__get('primeiroNome'): ''; ?>">
                                </div>

                                <div class="form-group div-coment">
                                    <label for="coment">Comentário</label>
                                    <input type="text" class="form-control" id="coment" name='coment' placeholder="Comentário" value="<?= isset($usuario) ? $usuario->__get('primeiroNome'): ''; ?>">
                                </div>

                                <button type="submit" class="btn btn-warning btn-add">Adicionar</button>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?> 
            
        </form>


    </div>
           
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>