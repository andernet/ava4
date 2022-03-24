<div class="container">
  <div class="row">
    <div class="col-12">
      <?= csrf_field(); ?>

      <h1>Hello, <?= $userInfo['id_user'] ?></h1>
      <a href="<?= site_url('auth/logout'); ?>">Logout</a>
    </div>
    <div class="row">
      <a href="<?= site_url('home/lista_aluno'); ?>">lista de aluno</a>

    </div>
  </div>
</div>

