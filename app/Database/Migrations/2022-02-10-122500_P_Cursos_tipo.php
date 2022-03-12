<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cursos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_curso'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'curso_sigla'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'curso_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'id_status'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ]
        ]);

        $this->forge->addKey('id_curso', true);
        $this->forge->createTable('cursos', false);
    }

    public function down()
    {
        $this->forge->dropTable('cursos');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key