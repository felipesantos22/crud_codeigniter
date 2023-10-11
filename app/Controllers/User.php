<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    public function createUser()
    {
        $model = new UserModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ],
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    // public function createUser()
    // {
    //     $model = new UserModel();
    //     $data = $this->request->getJSON();
    //     $model->insert($data);
    //     return $this->respondCreated($model);        
    // }

    public function readUser()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
}
