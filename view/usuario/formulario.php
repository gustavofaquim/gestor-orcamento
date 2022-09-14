<?php include __DIR__ . '/../template/header.php'; ?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <div class="row justify-content-md-center">
          <div class="container-login col col-lg-6">
            
          <?= isset($usuario)? '': '<h4>Cadastre-se, é gratis!</h4>' ?>

            <form action="/cadastrar-usuario<?= isset($usuario) ? '?id= ' . $usuario->__get('id') : ''; ?>" class='form-login' method="post">
              <div class="form-group">
                <label for="email">Endereço de email ou Usuário</label>
                <input type="text" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="E-mail ou Usuário" value="<?= isset($usuario) ? $usuario->__get('email'): ''; ?>">
                <!--<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seus dados com ninguém.</small>-->
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name='senha' placeholder="Senha" value="<?= isset($usuario) ? $usuario->__get('senha'): ''; ?>">
              </div>
              
              <button type="submit" class="btn btn-primary btn-login">Salvar</button>
            </form>

          </div>
        </div>
        
      
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>