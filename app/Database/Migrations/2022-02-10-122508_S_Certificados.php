<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class S_Certificados extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_certificado'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_aluno'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],

        ]);

        $this->forge->addKey('id_certificado', true);
        $this->forge->addForeignKey('id_aluno', 's_alunos', 'id_aluno', 'CASCADE', 'CASCADE');

        $this->forge->createTable('s_certificados', false);
        
    }

    public function down()
    {
        $this->forge->dropTable('s_certificados');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key