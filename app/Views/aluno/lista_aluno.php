<div class="container mt-5">
    <?php echo anchor(base_url('/AlunoController/cad_aluno'), 'Novo aluno', ['class' => 'btn btn-success mb-3']) ?>
    <table class="table" id="tbaluno">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>CPF</th>
            <th>Curso</th>
            <th>OM</th>
            <th>Situação</th>
            <th>saram</th>
            <th>Cod aluno</th>
            <th>Cod verificacao</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <?php foreach ($aluno as $dados) : ?>
            <tr>
                <td><?php echo $dados['id_aluno'] ?></td>
                <td><?php echo $dados['tratamento'].' '.$dados['quadro'].' '.$dados['posto_sigla'].' '.$dados['especialidade'].' '.$dados['nome_aluno'] ?></td>
                <td><?php echo $dados['cpf'] ?></td>
                <td><?php echo $dados['curso_sigla'] ?></td>
                <td><?php echo $dados['om_sigla'] ?></td>
                <td><?php echo $dados['situacao'] ?></td>
                <td><?php echo $dados['saram'] ?></td>
                <td><?php echo $dados['cod_aluno'] ?></td>
                <td><?php echo $dados['cod_verificacao'] ?></td>

                <td>
                    <?php echo anchor('user/edit/' . $dados['id_aluno'], 'Editar', ['class' => 'btn btn-primary']) ?>
                        -
                    <?php echo anchor('user/delete/' . $dados['id_aluno'], "<button type='button' class='btn btn-danger'>Excluir</button>", ['onclick' => 'return confirma()']) ?>
                        -

                    <?php //echo anchor('CertificadoController/geraCertificado/' . $dados['cod_aluno'], 'Gerar', ['class' => 'btn btn-info', 'target'=>'_blank', 'onclick' => 'return gerar()']) 
                    echo '-' ?>
                    <?php echo anchor('CertificadoController/geraCertificado/' . $dados['cod_aluno'], 'Gerar', ['class' => 'btn btn-info']) ?>
                    -

                    <?php echo anchor('CertificadoController/select_certificado/' . $dados['id_aluno'], 'Certificado', ['class' => 'btn btn-warning', 'target'=>'_blank']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tfoot>
    </table>
    <?php //echo $pager->links(); ?>
</div>