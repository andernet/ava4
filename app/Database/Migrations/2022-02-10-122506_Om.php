<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Om extends Migration
{
    public function up()		 	
    {
        $this->forge->addField([
            'id_om'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'om_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);

        $this->forge->addKey('id_om', true);
        $this->forge->createTable('om', false);
    }

    public function down()
    {
        $this->forge->dropTable('om');
    }
}