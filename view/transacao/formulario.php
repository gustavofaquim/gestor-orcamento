<?php include __DIR__ . '/../template/header.php'; ?>

<main>
  <div class="container-fluid">
    <div class='formTransacao'>

    <?php if(isset($tipos)): ?> 
       
        <?php foreach ($tipos as $tipo): ?>
            <form action="/cadastrar-transacao<?= isset($usuario) ? '?id= ' . $usuario->__get('id') : ''; ?>" class='' method="post">

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item  <?php echo "accordion".$tipo->__get('descricao'); ?> accordionDespesa">
                            <h2 class="accordion-header" id="panelsStayOpen-headingDespesa">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="<?='#collapse',$tipo->__get('descricao')?>" aria-expanded="true" aria-controls="<?='collapse',$tipo->__get('descricao')?>">
                                <?= $tipo->__get('descricao') ?>
                            </button>
                            </h2>
                            <div id="<?= 'collapse'.$tipo->__get('descricao') ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingDespesa">
                                <div class='accordion-body'>

                                    <div class="form-group div-valor">
                                        <label for="valor">R$</label>
                                        <input type="text" class="form-control" id="valor" name='valor' placeholder="0" value="">
                                    </div>

                                    <input type="hidden" name="idtipo" id="idtipo" value="<?= $tipo->__get('idtipo') ?>">

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
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" id="data" name='data' value="">
                                    </div>

                                    <div class="form-group div-coment">
                                        <label for="coment">Comentário</label>
                                        <input type="text" class="form-control" id="coment" name='coment' placeholder="Comentário" value="">
                                    </div>

                                    <button type="submit" class="btn btn-warning btn-add">Adicionar</button>

                                </div>
                            </div>
                        </div>
                    </div>            
            </form>
        <?php endforeach; ?>
    <?php else: ?>
      
        <form action="/cadastrar-transacao<?='?id='.$transacao->__get('idtransacao')?>" class='' method="post">

            <div class="form-group div-valor">
                <label for="valor">R$</label>
                <input type="text" class="form-control" id="valor" name='valor' placeholder="0" value="<?php echo $transacao->__get('valor') ?>">
            </div>

            <input type="hidden" name="idtipo" id="idtipo" value="<?= $transacao->__get('tipo')->__get('idtipo') ?>">

            <div class="form-group div-conta">
                <label for="conta">Conta</label>
                    <select class="form-control" id="conta" name='conta'>
                    <?php 
                    
                    foreach ($contas as $conta){
                    
                        if($transacao->__get('conta')->__get('idconta') == $conta->__get('idconta')){
                            echo "<option value='".$conta->__get('idconta')."' selected > <p>".$conta->__get('nome')."</p></option>"; 
                        }else{
                            echo "<option value='".$conta->__get('idconta')."'> <p>".$conta->__get('nome')."</p></option>"; 
                        }
                       
                        
                        
                    }
                ?>
                </select>
            </div>

            <div class="form-group div-conta">
                <label for="categoria">Categoria</label>
                
                    <select class="form-control" id="categoria" name="categoria">
                    <?php 
                    
                        foreach ($categorias as $categoria){
                        
                            if($categoria->__get('tipotransacao')->__get('idtipo') == $transacao->__get('tipo')->__get('idtipo')){
                                if($transacao->__get('categoria')->__get('idcategoria') == $categoria->__get('idcategoria')){
                                    echo "<option value='".$categoria->__get('idcategoria')."' selected > <p><i class='".$categoria->__get('icon')."'></i> ".$categoria->__get('descricao')."</p></option>"; 
                                }else{
                                    echo "<option value='".$categoria->__get('idcategoria')."'> <p><i class='".$categoria->__get('icon')."'></i> ".$categoria->__get('descricao')."</p></option>"; 
                                }
                            }
                        }
                    ?>
                </select>
            </div> 

            <div class="form-group div-coment">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name='data' value="<?php echo $transacao->__get('data') ?>">
            </div>

            <div class="form-group div-coment">
                <label for="coment">Comentário</label>
                <input type="text" class="form-control" id="coment" name='coment' placeholder="Comentário" value="<?php echo $transacao->__get('comentario') ?>">
            </div>

            <button type="submit" class="btn btn-warning btn-add">Atualizar</button>
        </form>
    <?php endif; ?>                                      

    </div>
           
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>