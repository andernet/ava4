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
            'id_tratamento'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,

                // 'id_tratamento'          => [
                // 'type'           => 'INT',
                // 'constraint'     => 5,
                // 'unsigned'       => true,
                // 'auto_increment' => true,











                //'unsigned' => TRUE,
            //'CONSTRAINT `TABLENAME_users_foreign` FOREIGN KEY(`id_tratamento`) REFERENCES `p_tratamento`(`id`)'
            ],
            // 'curso_descricao'       => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => '11',
            // ],
            // 'id_status'       => [
            //     'type'       => 'INT',
            //     'constraint' => '2',
            // ]

        ]);

        $this->forge->addKey('id_certificado', true);
        $this->forge->addForeignKey('id_tratamento', 'p_tratamento', 'id_tratamento', 'CASCADE', 'CASCADE');



        $this->forge->createTable('s_certificados', false);
        
        
        
    }

    public function down()
    {
        $this->forge->dropTable('s_certificados');
    }
}

// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key