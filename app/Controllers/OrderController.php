<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    use ResponseTrait;

    //Create Order
    public function createOrder()
    {
        $model = new OrderModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ],
                'Order' => $data
            ];
            return $this->respond($response);
        }

        return $this->fail($model->errors());
    }

    // List All Order
    public function readOrder()
    {
        $model = new OrderModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // List Order By Id
    public function showId($id = null)
    {
        $model = new OrderModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }

    // Update Order
    public function updateOrder($id = null)
    {
        $model = new OrderModel();
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
                'Order' => $data
            ];
            return $this->respond($response);
        };

        return $this->fail($model->errors());
    }

    // Delete Order
    public function deleteOrder($id = null)
    {
        $model = new OrderModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados removidos'
                ],
                'Order' => $data
            ];
            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }

    //Filtrar nomes
    public function filterStatus()
    {       
        $model = new OrderModel();
        $nome = $this->request->getGet('status');
        $client = $model->where('status',$nome)->findAll();
        return $this->respond($client);
    }
    
}
