<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ]
        ]);
        $this->forge->addKey(['order_id', 'product_id'], true);
        $this->forge->addForeignKey('order_id', 'order', 'id');
        $this->forge->addForeignKey('product_id', 'product', 'id');
        $this->forge->createTable('order_product', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('order_product');
    }
}
