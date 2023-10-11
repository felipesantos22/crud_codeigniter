<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'todo_example';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nome'];
}
