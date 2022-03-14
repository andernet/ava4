<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ]
        ]);

        $this->forge->addKey('id_status', true);
        $this->forge->createTable('p_status', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_status');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key