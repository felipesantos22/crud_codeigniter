<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'client_id' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('client_id', 'client', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
