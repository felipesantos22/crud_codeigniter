<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pedido extends Migration
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
            'cliente_id' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('cliente_id', 'cliente', 'id');
        $this->forge->createTable('pedido');
    }

    public function down()
    {
        $this->forge->dropTable('pedido');
    }
}
