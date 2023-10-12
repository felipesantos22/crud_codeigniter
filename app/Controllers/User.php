<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ProductModel;

class User extends BaseController
{
    use ResponseTrait;

    //Create Product
    public function createUser()
    {
        $model = new ProductModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ],
                'Client' => $data
            ];
            return $this->respond($response);
        }

        return $this->fail($model->errors());
    }

    // List All Product
    public function readUser()
    {
        $model = new ProductModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // List Product By Id
    public function showId($id = null)
    {
        $model = new ProductModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }

    // Update Product
    public function updateUser($id = null)
    {
        $model = new ProductModel();
        $data = $this->request->getJSON();

        if ($model->update($id, $data)) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados atualizados'
                ],
                'Product' => $data
            ];
            return $this->respond($response);
        };

        return $this->fail($model->errors());
    }

    // Delete Product
    public function deleteUser($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);
        
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados removidos'
                ],
                'Product' => $data
            ];
            return $this->respondDeleted($response);
        }
        
        return $this->failNotFound('Nenhum dado encontrado com id '.$id);        
    }
 
}
