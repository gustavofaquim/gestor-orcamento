<?php include __DIR__ . '/../template/header.php'; ?>



<div class='container-fluid tela-contas'>
    <div class="card card-contas">
        <div class="card-header">
            Contas
        </div>
        <ul class="list-group list-group-flush">
        <?php 
            //echo "-------------------------------------------<br><br>";
            //var_dump($contas);
        
        ?>
        <?php foreach ($contas1 as $conta): ?>
            <li class="list-group-item">
                <div class='descricao'><?= $conta->__get('nome'); ?> </div>
                <div class='valor'>R$<?= $conta->__get('saldo'); ?> </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <a href='/nova-conta' class="btn btn-warning btn-add"><span>+</span></a>
</div>




<?php include __DIR__ . '/../template/footer.php'; ?>