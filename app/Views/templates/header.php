

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/css/style.css">
      <title></title>
      <script>
         function confirma() {
             if (!confirm('Desejar excluir o usuário?')) {
                 return false;
             }
         
             return true;
         }
         
         function gerar() {
             if (!confirm('Desejar gerar Certificado para esse aluno?')) {
                 return false;
             }
         
             return true;
         }
         
         $(document).ready(function() {
             $('#tbalunos').DataTable( {
                 "ajax": "data/arrays.txt"
             } );
         } );
      </script>
   </head>
   <body>
      <?= csrf_field(); ?>
      <?php
         $uri = service('uri');
         ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container">
            <a class="navbar-brand" style="color: #FFD700" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               
               
              
               <?php if (! session()->get('loggedUser')): ?>
            
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="Auth/">Login</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/register">Register</a>
                  </li>
               </ul>



               <?php else: ?>
               



<!-- parte admin -->
               <?php if (session()->get('tipoUser') == 1): ?>

               <ul class="navbar-nav mr-auto">

                  <li class="nav-item">
   <a class="nav-link" style="color: #FFD700" href="/AlunoController/">Lista de Alunos</a>
   </li>


<li class="nav-item">
   <a class="nav-link" style="color: #FFD700" href="/UserController/cad_user/">Lista de usuarios</a>
</li>

</ul>


               <?php else: ?>
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
         <a class="nav-link" href="/AvaController/pre">Pre Curso</a>
      </li>



         
                  <li class="nav-item">
         <a class="nav-link" href="/AvaController/ava_int">Avaliacao da instrucao</a>
</li>


         
                  <li class="nav-item">
         <a class="nav-link" href="/AvaController/ava_curso">Avaliacao do curso</a>
</li>


         
                  <li class="nav-item">
         <a class="nav-link" href="/AvaController/cad_user">Pos Curso</a>
</li>
</ul>
               <?php endif; ?>

<!-- fim admin -->

   


               <ul class="navbar-nav my-2 my-lg-0">
                  <li class="nav-item">
                     <a href="<?= site_url('auth/logout'); ?>">Logout</a>
                  </li>
               </ul>
               <?php endif; ?>
            </div>
         </div>
      </nav>

