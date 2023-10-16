<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    use ResponseTrait;


    public function createProduct()
    {
        $model = new ProductModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'messages' => [
                    'success' => 'Produto salvo'
                ],
                'Produto' => $data
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }




    public function readProduct()
    {
        $model = new ProductModel();
        $data = $model->findAll();
        return $this->respond($data);
    }




    public function showId($id = null)
    {
        $model = new ProductModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum produto encontrado com id ' . $id);
    }




    public function updateProduct($id = null)
    {
        $model = new ProductModel();
        $data = $this->request->getJSON();
        if (!$model->find($id)) {
            return $this->failNotFound('Nenhum produto encontrado com id ' . $id);
        }
        if ($model->update($id, $data)) {
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Produto atualizado'
                ],
                'Product' => $data
            ];
            return $this->respond($response);
        };

        return $this->fail($model->errors());
    }




    public function deleteProduct($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Produto removido'
                ],
                'Product' => $data
            ];
            return $this->respondDeleted($response);
        }
        return $this->failNotFound('Nenhum produto encontrado com id ' . $id);
    }



    
     public function filterName()
     {       
         $model = new ProductModel();
         $nome = $this->request->getGet('nome');
         $client = $model->where('nome',$nome)->findAll();
         return $this->respond($client);
     }
}
