<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Registro de alunos</h3>
        <hr>
        <form class="" action="/user/create" method="post">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="nome_aluno">Nome</label>
               <input type="text" class="form-control" name="nome_aluno" id="nome_aluno" placeholder="Ex: 2S Fulano" value="<?= set_value('nome_aluno')  ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="cpf">CPF</label>
               <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Ex: fulano_ft" value="<?= set_value('cpf') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="id_tratamento">Tratamento</label>
               <input type="text" class="form-control" name="id_tratamento" id="id_tratamento" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="id_posto">Posto</label>
              <input type="text" class="form-control" name="id_posto" id="id_posto" value="">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="id_quadro">Quadro</label>
              <input type="text" class="form-control" name="id_quadro" id="id_quadro" value="">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="id_especialidade">Especialidade</label>
              <input type="text" class="form-control" name="id_especialidade" id="id_especialidade" value="">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="id_om">OM</label>
              <input type="text" class="form-control" name="id_om" id="id_om" value="">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="saram">SARAM/EB/MB/CV/CD</label>
              <input type="text" class="form-control" name="saram" id="saram" value="">
            </div>
          </div>
          <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="senha">Senha</label>
               <input type="password" class="form-control" name="senha" id="senha" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="senha_confirm">Confirmar Senha</label>
              <input type="password" class="form-control" name="senha_confirm" id="senha_confirm" value="">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="curso">Curso</label>
              <input type="text" class="form-control" name="curso" id="curso" value="">
            </div>
          </div>

          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="cod_aluno">Curso</label>
              <input type="text" class="form-control" name="cod_aluno" id="cod_aluno" value="">
            </div>
          </div>

         
</br>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>
<br />
          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>