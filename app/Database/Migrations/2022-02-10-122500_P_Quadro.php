<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class P_Quadro extends Migration
{
    public function up()		 	
    {
        $this->forge->addField([
            'id_quadro'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'quadro_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->forge->addKey('id_quadro', true);
        $this->forge->createTable('p_quadro', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_quadro');
    }
}