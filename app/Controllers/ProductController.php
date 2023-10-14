<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ProdutoModel;

class ProductController extends BaseController
{
    use ResponseTrait;

    //Create Product
    public function createProduct()
    {
        $model = new ProdutoModel();
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
    public function readProduct()
    {
        $model = new ProdutoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }




    // List Product By Id
    public function showId($id = null)
    {
        $model = new ProdutoModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }




    // Update Product
    public function updateProduct($id = null)
    {
        $model = new ProdutoModel();
        $data = $this->request->getJSON();
        if (!$model->find($id)) {
            return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
        }
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
    public function deleteProduct($id = null)
    {
        $model = new ProdutoModel();
        $data = $model->find($id);

        if ($data) {
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

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }



    
     //Filtrar nomes
     public function filterName()
     {       
         $model = new ProdutoModel();
         $nome = $this->request->getGet('nome');
         $client = $model->where('nome',$nome)->findAll();
         return $this->respond($client);
     }
}
