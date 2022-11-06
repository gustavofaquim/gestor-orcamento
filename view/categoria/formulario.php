<?php include __DIR__ . '/../template/header.php'; ?>

<main>
  <div class="container-fluid">
    <div class='formTransacao'>


        <form action="/cadastrar-categoria<?= isset($categoria) ? '?id= ' . $categoria->__get('idcategoria') : ''; ?>" class='' method="post">
                
            
            <div class="form-group div-conta">
                <label for="nome">Descrição</label>
                <input type="text" class="form-control" id="desc" name='desc' value="<?= isset($categoria) ? $categoria->__get('descricao'): ''; ?>">
            </div>

            
            <button type="submit" class="btn btn-warning btn-add">Salvar</button>
        </form>


    </div>
           
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>