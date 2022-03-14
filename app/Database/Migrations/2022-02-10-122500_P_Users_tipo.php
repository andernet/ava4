<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Users_tipo extends Migration
{
    public function up()		 	
    {
        $this->forge->addField([
            'id_user_tipo'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_tipo_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ]
        ]);

        $this->forge->addKey('id_user_tipo', true);
        $this->forge->createTable('p_users_tipo', false);
    }

    public function down()
    {
        $this->forge->dropTable('p_users_tipo');
    }
}