<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => 11
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'razao_social' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'endereco' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('cliente');
    }

    public function down()
    {
        $this->forge->dropTable('cliente');
    }
}
