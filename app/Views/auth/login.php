<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Login</h3>
        <hr>
  
        <form class="" action="<?= base_url('auth/check') ?>" method="post">
          <?= csrf_field(); ?>
          <div class="form-group">
           <label for="username">Nome do usuário</label>
           <input type="text" placeholder="Ex: 2S Fulano"  class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
          </div>
          <div class="form-group">
           <label for="senha">Senha</label>
           <input type="senha" placeholder="Ex: 2S Fulano"  class="form-control" name="senha" id="senha" value="<?= set_value('senha') ?>">
          </div>
          
          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="col-12 col-sm-8 text-right">
              <a  href="<?= site_url("auth/register") ?>">Não tem uma conta ainda?</a>
            </div>
            
          </div>
        </form>
      </div>
      <br />
      <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
    </div>
  </div>

</div>
</body>
</html>
