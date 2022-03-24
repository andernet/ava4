<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class S_Aluno extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aluno'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome_aluno'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'cpf'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'id_curso'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_tratamento'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_posto'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_quadro'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_especialidade'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_om'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_situacao'    => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'saram'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'cod_aluno'       => [
                'type'       => 'INT',
                'constraint' => 15,
                'unsigned'       => true,
                'unique'     => true,
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'created_at datetime default current_timestamp',
    'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id_aluno', true);

        $this->forge->addForeignKey('id_curso', 'p_curso', 'id_curso');
        $this->forge->addForeignKey('id_tratamento', 'p_tratamento', 'id_tratamento');
        $this->forge->addForeignKey('id_posto', 'p_posto', 'id_posto');
        $this->forge->addForeignKey('id_quadro', 'p_quadro', 'id_quadro');
        $this->forge->addForeignKey('id_especialidade', 'p_especialidade', 'id_especialidade');
        $this->forge->addForeignKey('id_om', 'p_om', 'id_om');
        $this->forge->addForeignKey('id_situacao', 'p_situacao', 'id_situacao');







        $this->forge->createTable('s_aluno', false);

        $this->db->query("INSERT INTO `s_aluno` (`id_aluno`, `nome_aluno`, `cpf`, `id_curso`, `id_tratamento`, `id_posto`, `id_quadro`, `id_especialidade`, `id_om`, `id_situacao`, `saram`, `cod_aluno`, `password`) VALUES (NULL, '1', '15478968745', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')");
    }

    public function down()
    {
        $this->forge->dropTable('s_aluno');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.aluno'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key