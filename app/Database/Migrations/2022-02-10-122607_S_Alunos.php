<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alunos extends Migration
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
                'constraint' => '2',
            ],
            'id_tratamento'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'id_posto'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'id_quadro'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'id_especialidade'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'id_om'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'id_situcacao'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'saram'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'cod_aluno'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'unique'            => true,
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
        ]);

        $this->forge->addKey('id_aluno', true);
        $this->forge->createTable('s_alunos', false);
    }

    public function down()
    {
        $this->forge->dropTable('s_alunos');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.alunos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key