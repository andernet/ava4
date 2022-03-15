<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class P_Especialidade extends Migration
{
    public function up()		 	
    {
        $this->forge->addField([
            'id_especialidade'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'especialidade_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->forge->addKey('id_especialidade', true);
        $this->forge->createTable('p_especialidade', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_especialidade');
    }
}