<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cliente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cnpj', 'nome', 'razao_social', 'endereco'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'cnpj' => 'required|is_unique[cliente.cnpj]',
        'razao_social' => 'required|is_unique[cliente.razao_social]'
    ];
    protected $validationMessages   = [
        'cnpj' => [
            'is_unique' => 'O cnpj já está em uso.',
            'required' => 'O campo cnpj é obrigatório.',
        ],
        'razao_social' => [
            'is_unique' => 'Razão social já está em uso.',
            'required' => 'O campo razão social é obrigatório.',
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
