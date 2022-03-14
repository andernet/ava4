<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cursos_tipo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cursos_tipo'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cursos_tipo_sigla'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'cursos_tipo_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
        ]);

        $this->forge->addKey('id_cursos_tipo', true);
        $this->forge->createTable('p_cursos_tipo', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_cursos_tipo');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key