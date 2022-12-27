<?php include __DIR__ . '/../template/header.php'; ?>

<main>
  <div class="container-fluid">
    <div class='formTransacao'>


        <form action="/cadastrar-conta<?= isset($usuario) ? '?id= ' . $usuario->__get('id') : ''; ?>" class='' method="post">
                
            <div class="form-group div-valor ">
                <label for="saldo">R$</label>
                <input type="text" class="form-control" id="saldo" name='saldo' placeholder="0" value="<?= isset($usuario) ? $usuario->__get('primeiroNome'): ''; ?>">
            </div>
               
            
            <div class="form-group div-conta">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name='nome' value="<?= isset($usuario) ? $usuario->__get('nome'): ''; ?>">
            </div>

              
            <div class="form-group div-conta">
                <label for="desc">Descrição</label>
                <input type="text" class="form-control" id="desc" name='desc' placeholder='Ex: Conta Salário' value="<?= isset($usuario) ? $usuario->__get('nome'): ''; ?>">
            </div>
           
            
            <button type="submit" class="btn btn-warning btn-add">Criar Conta</button>
        </form>


    </div>
           
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>