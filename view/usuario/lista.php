<?php include __DIR__ . '/../template/header.php'; ?>

<ul class="list-group">
    <?php foreach ($usuarios as $user): ?>
        <li class="list-group-item d-flex justify-content-between">
            <?= $user->__get('primeiroNome'); ?>
        </li>
    <?php endforeach; ?>
</ul>

<a href='/nova-conta' class="btn btn-warning btn-add">+</a>

<?php include __DIR__ . '/../template/footer.php'; ?>