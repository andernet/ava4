<div class="container mt-5">
    <?php echo anchor(base_url('/AlunosController/cad_aluno'), 'Novo aluno', ['class' => 'btn btn-success mb-3']) ?>
    <table class="table">
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
            <th>Ações</th>

        </tr>
        <?php foreach ($alunos as $aluno) : ?>
            <tr>
                <td><?php echo $aluno['id_aluno'] ?></td>
                <td><?php echo $aluno['nome_aluno'] ?></td>
                <td><?php echo $aluno['cpf'] ?></td>
                <td><?php echo $aluno['id_curso'] ?></td>
                <td><?php echo $aluno['id_tratamento'] ?></td>
                <td><?php echo $aluno['id_posto'] ?></td>
                <td><?php echo $aluno['id_quadro'] ?></td>
                <td><?php echo $aluno['id_especialidade'] ?></td>
                <td><?php echo $aluno['id_om'] ?></td>
                <td><?php echo $aluno['id_situcacao'] ?></td>
                <td><?php echo $aluno['saram'] ?></td>
                <td><?php echo $aluno['cod_aluno'] ?></td>

                <td>
                    <?php echo anchor('user/edit/' . $aluno['id_aluno'], 'Editar', ['class' => 'btn btn-primary']) ?>
                        -
                    <?php echo anchor('user/delete/' . $aluno['id_aluno'], "<button type='button' class='btn btn-danger'>Excluir</button>", ['onclick' => 'return confirma()']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $pager->links(); ?>
</div>