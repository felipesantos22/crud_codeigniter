<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    //Create user
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

    // Read user
    public function readUser()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // lista um livro
    public function showId($id = null)
    {
        $model = new UserModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if($data){
            return $this->respond($data);
        }
        
        return $this->failNotFound('Nenhum dado encontrado com id '.$id);        
    }

    // Update user
    public function updateUser()
    {

    }

}
