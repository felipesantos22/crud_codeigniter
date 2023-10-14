<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('produto', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('produto');
    }
}
