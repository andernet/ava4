<?php
// echo '<pre>';
// // mostra todos os indíces possíveis para a matriz de variáveis

// print_r(get_defined_vars());
// echo '</pre>';
// dd();
    // [id_aluno] => 1
    // [nome_aluno] => 1
    // [cpf] => 15478968745
    // [id_curso] => 1
    // [id_tratamento] => 1
    // [id_posto] => 1
    // [id_quadro] => 1
    // [id_especialidade] => 1
    // [id_om] => 1
    // [id_situacao] => 1
    // [saram] => 1
    // [cod_aluno] => 1
    // [password] => 1
    // [created_at] => 2022-03-22 19:42:14
    // [updated_at] => 2022-03-22 19:42:14
    // [especialidade] => ADE
    // [] => 1º GCC
    // [om_descricao] => 1º Grupo de Comunicações e Controle
    // [hierarquia] => 1
    // [] => MA
    // [] => CBI
    // [] => Curso Básico de Inteligência
    // [] => 
    // [] => 1
    // [] => 1
    // [] => 1
    // [] => qwerqwer


?>
<div class="container mt-5">
    <?php echo anchor(base_url('/AlunosController/cad_aluno'), 'Novo aluno', ['class' => 'btn btn-success mb-3']) ?>
    <table class="table" id="tbalunos">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>CPF</th>
            <th>Curso</th>
            <th>Tratamento</th>
            <th>Posto</th>
            <th>Quadro</th>
            <th>Especialidade</th>
            <th>OM</th>
            <th>Situação</th>
            <th>saram</th>
            <th>Cod aluno</th>
            <th>Cod verificacao</th>
            <th>Ações</th>

        </tr>
    </thead>
    <tfoot>
        <?php foreach ($alunos as $aluno) : ?>
            <tr>
                <td><?php echo $aluno['id_aluno'] ?></td>
                <td><?php echo $aluno['tratamento'].' '.$aluno['quadro'].' '.$aluno['posto_sigla'].' '.$aluno['especialidade'].' '.$aluno['nome_aluno'] ?></td>
                <td><?php echo $aluno['cpf'] ?></td>
                <td><?php echo $aluno['curso_sigla'] ?></td>
                <td><?php echo  'v'?></td>
                <td><?php echo  ''?></td>
                <td><?php echo  ''?></td>
                <td><?php echo  ''?></td>
                <td><?php echo $aluno['om_sigla'] ?></td>
                <td><?php echo $aluno['id_situacao'] ?></td>
                <td><?php echo $aluno['saram'] ?></td>
                <td><?php echo $aluno['cod_aluno'] ?></td>
                <td><?php echo $aluno['cod_verificacao'] ?></td>

                <td>
                    <?php echo anchor('user/edit/' . $aluno['id_aluno'], 'Editar', ['class' => 'btn btn-primary']) ?>
                        -
                    <?php echo anchor('user/delete/' . $aluno['id_aluno'], "<button type='button' class='btn btn-danger'>Excluir</button>", ['onclick' => 'return confirma()']) ?>
                        -

                    <?php //echo anchor('CertificadoController/geraCertificado/' . $aluno['cod_aluno'], 'Gerar', ['class' => 'btn btn-info', 'target'=>'_blank', 'onclick' => 'return gerar()']) 
                    echo '-' ?>
                    <?php echo anchor('CertificadoController/geraCertificado/' . $aluno['cod_aluno'], 'Gerar', ['class' => 'btn btn-info']) ?>
                    -

                    <?php echo anchor('CertificadoController/select_certificado/' . $aluno['cod_aluno'], 'Certificado', ['class' => 'btn btn-warning', 'target'=>'_blank']) ?>
                    



        





                    

                    


                   

                </td>
            </tr>
        <?php endforeach; ?>
    </tfoot>
    </table>
    <?php //echo $pager->links(); ?>
</div>