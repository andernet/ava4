<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class P_Cursos_curriculo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cursos_curriculo'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cursos_curriculo'       => [
                'type'       => 'text',
                //'constraint' => '250',
            ],
            'cursos_curriculo_carga'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->forge->addKey('id_cursos_curriculo', true);
        $this->forge->createTable('p_cursos_curriculo', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_cursos_curriculo');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key