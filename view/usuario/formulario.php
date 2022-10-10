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
                <label for="primeiroNome">Primeiro Nome</label>
                <input type="text" class="form-control" id="primeiroNome" name='primeiroNome'  placeholder="Primeiro Nome" value="<?= isset($usuario) ? $usuario->__get('primeiroNome'): ''; ?>">
              </div>

              <div class="form-group">
                <label for="ultimoNome">Ultimo Nome</label>
                <input type="text" class="form-control" id="ultimoNome" name='ultimoNome'  placeholder="Ultimo Nome" value="<?= isset($usuario) ? $usuario->__get('ultimoNome'): ''; ?>">
              </div>
            
              <div class="form-group">
                <label for="email">Endereço de E-mail</label>
                <input type="text" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="E-mail ou Usuário" value="<?= isset($usuario) ? $usuario->__get('email'): ''; ?>">
                <!--<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seus dados com ninguém.</small>-->
              </div>

              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name='senha' placeholder="Senha" value="<?= isset($usuario) ? $usuario->__get('senha'): ''; ?>">
              </div>

              <div class="form-group">
                <label for="senha2">Confirmação de Senha</label>
                <input type="password" class="form-control" id="senha2" name='senha2' placeholder=" Confirmação de Senha" value="<?= isset($usuario) ? $usuario->__get('senha'): ''; ?>">
              </div>
              
              <button type="submit" class="btn btn-primary btn-login">Salvar</button>
              <a class="btn btn-cadastrar btn-cadastro btn-light" href="/login">Login</a>
            </form>

          </div>
        </div>
        
      
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/../template/footer.php'; ?>