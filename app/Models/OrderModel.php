<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pedido';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['status', 'cliente_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    // https://codeigniter4.github.io/userguide/libraries/validation.html#
    protected $validationRules      = [
        'status' => 'in_list[Em Aberto,Pago,Cancelado]',
        'cliente_id' => 'required|is_valid_client_id[pedido.cliente_id]',
    ];
    protected $validationMessages   = [
        'status' => [
            'in_list' => 'O campo Status deve ser um dos seguintes valores: Em Aberto, Pago, Cancelado.',
        ],
        'cliente_id' => [
            'is_valid_client_id' => 'Cliente_id não exite.'
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
