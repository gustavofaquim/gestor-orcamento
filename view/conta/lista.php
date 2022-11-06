<?php include __DIR__ . '/../template/header.php'; ?>



<div class='container-fluid'>
    <div class="card card-contas">
    <div class="card-header">
        Contas
    </div>
    <ul class="list-group list-group-flush">
    <?php foreach ($contas as $conta): ?>
        <li class="list-group-item">
            <div class='descricao'><?= $conta->__get('nome'); ?> </div>
            <div class='valor'>R$<?= $conta->__get('saldo'); ?> </div>
        </li>
        <?php endforeach; ?>
    </ul>
    </div>
</div>



<a href='/nova-conta' class="btn btn-warning btn-add">+</a>

<?php include __DIR__ . '/../template/footer.php'; ?>