<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produto_pedido';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pedido_id', 'produto_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'pedido_id' => 'required|is_valid_order_id[produto_pedido.pedido_id]',
        'produto_id' => 'required|is_valid_product_id[produto_pedido.produto_id]',
    ];
    protected $validationMessages   = [
        'pedido_id' => [
            'is_valid_order_id' => 'Pedido_id não exite.',
        ],
        'produto_id' => [
            'is_valid_product_id' => 'Produto_id não exite.'
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
