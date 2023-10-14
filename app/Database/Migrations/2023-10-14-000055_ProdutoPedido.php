<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdutoPedido extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'produto_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'pedido_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('produto_id', 'produto', 'id');
        $this->forge->addForeignKey('pedido_id', 'pedido', 'id');
        $this->forge->createTable('produto_pedido');
    }

    public function down()
    {
        $this->forge->dropTable('produto_pedido');
    }
}

