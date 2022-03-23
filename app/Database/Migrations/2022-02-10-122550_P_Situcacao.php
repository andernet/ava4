<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class P_Situacao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_situacao'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'situacao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ]
            ]);

        $data = [
            'situacao' => 'REPROVADO',
        ];

        $data1 = [
            'situacao' => 'APROVADO',
        ];
        $this->forge->addKey('id_situacao', true);
        $this->forge->createTable('p_situacao', false);

        $this->db->query("INSERT INTO p_situacao (situacao) VALUES (:situacao:)", $data);
        $this->db->query("INSERT INTO p_situacao (situacao) VALUES (:situacao:)", $data1);
    }

    public function down()
    {
        $this->forge->dropTable('p_situacao');
    }
}


// ERROR - 2022-02-10 07:33:25 --> Unknown table 'ava.cursos'
// ERROR - 2022-02-10 07:33:25 --> Incorrect table definition; there can be only one auto column and it must be defined as a key