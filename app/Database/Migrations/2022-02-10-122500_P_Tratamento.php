<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Tratamento extends Migration
{
    public function up()		 	
    {
        $this->forge->addField([
            'id_tratamento'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tratamento_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->forge->addKey('id_tratamento', true);
        $this->forge->createTable('p_tratamento', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_tratamento');
    }
}

