<?php include __DIR__ . '/../template/header.php'; ?>

<ul class="list-group">
  
    <?php foreach ($categorias as $categoria): ?>
        <a href="/alterar-categoria?id=<?= $categoria->__get('idcategoria');?>">
        <div class='card-categoria'>
            <img src="<?= $categoria->__get('icon'); ?>" class="img-fluid" alt="">
            <p><?= $categoria->__get('descricao'); ?></p>
        </div><a/>
       
    <?php endforeach; ?>
</ul>

<a href='/nova-categoria' class="btn btn-warning btn-add">+</a>

<?php include __DIR__ . '/../template/footer.php'; ?>