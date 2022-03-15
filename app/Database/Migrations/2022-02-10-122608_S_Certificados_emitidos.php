<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class S_Certificados_emitidos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_certificado_emitidos'          => [
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
            'cod_verificacao'          => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],

        ]);

        $this->forge->addKey('id_certificado_emitidos', true);
        //$this->forge->addForeignKey('id_aluno', 's_alunos', 'id_aluno', 'CASCADE', 'CASCADE');

        $this->forge->createTable('s_certificados_emitidos', false);
        
    }

    public function down()
    {
        $this->forge->dropTable('s_certificados_emitidos');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key