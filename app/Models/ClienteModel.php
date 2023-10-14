<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
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
        'razao_social' => 'required|is_unique[cliente.razao_social]',
        'cnpj' => 'required|is_unique[cliente.cnpj]'
    ];
    protected $validationMessages   = [
        'razao_social' => [
            'is_unique' => 'Razão social já está em uso.',
            'required' => 'O campo razão social é obrigatório.',
        ],
        'cnpj' => [
            'is_unique' => 'O cjpj já está em uso.',
            'required' => 'O campo cnpj é obrigatório.',
        ]
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
