<?php include __DIR__ . '/../template/header.php'; ?>

<div class='container-fluid tela-contas'>
    <div class="card card-contas">
        <div class="card-header">
            Categorias
        </div>
        <ul class="list-group list-group-flush">
        <?php 
            //echo "-------------------------------------------<br><br>";
            //var_dump($contas);
        
        ?>
        <?php foreach ($categorias as $categoria): ?>
            <li class="list-group-item">
                <a href="/alterar-categoria?id=<?= $categoria->__get('idcategoria');?>">
                    <div id='icon-categoria' style="background-color: <?= $categoria->__get('cor')  ?>" class='descricao'> <i class='<?= $categoria->__get('icon') ?>'> </i> </div>
                    <div class='valor'><?= $categoria->__get('descricao'); ?> </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <a href='/nova-categoria' class="btn btn-warning btn-add"><span>+</span></a>
</div>





<?php include __DIR__ . '/../template/footer.php'; ?>