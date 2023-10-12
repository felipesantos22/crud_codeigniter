<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table            = 'cliente';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['cpf', 'nome', 'razao_social', 'endereco'];
}
