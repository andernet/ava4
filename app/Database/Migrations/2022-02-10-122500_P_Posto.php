<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Posto extends Migration
{
    public function up()		 	
    {
        $this->forge->addField([
            'id_posto'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'posto_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->forge->addKey('id_posto', true);
        $this->forge->createTable('posto', false);
    }

    public function down()
    {
        $this->forge->dropTable('posto');
    }
}