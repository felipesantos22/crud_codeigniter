<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('product', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
