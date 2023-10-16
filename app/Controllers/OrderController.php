<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\OrderModel;
use Exception;

class OrderController extends BaseController
{
    use ResponseTrait;


    // public function createOrder()
    // {

    //     $model = new OrderModel();
    //     $data = $this->request->getJSON();

    //     if ($model->insert($data)) {
    //         $response = [
    //             'status'   => 201,
    //             'messages' => [
    //                 'success' => 'Pedido salvo'
    //             ],
    //             'Pedido' => $data
    //         ];
    //         return $this->respond($response);
    //     }
    //     return $this->fail($model->errors());
    // }


    public function createOrder()
    {

        $model = new OrderModel();
        $data = $this->request->getJSON();

        $clienteModel = new ClientModel();

        
        $cliente_id = $this->request->getVar('cliente_id');
        

        $cliente = $clienteModel->find($cliente_id);

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'messages' => [
                    'success' => 'Pedido salvo'
                ],
                'Pedido' => $data
            ];
            return $this->respond($response);
        }
        if (empty($cliente)) {
            return $this->fail($model->errors());
        }
        return $this->fail($model->errors());
    }



    public function readOrder()
    {
        $model = new OrderModel();
        $data = $model->findAll();
        return $this->respond($data);
    }




    public function showId($id = null)
    {
        $model = new OrderModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum pedido encontrado com id ' . $id);
    }




    public function updateOrder($id = null)
    {
        $model = new OrderModel();
        $data = $this->request->getJSON();
        if (!$model->find($id)) {
            return $this->failNotFound('Nenhum pedido encontrado com id ' . $id);
        }
        if ($model->update($id, $data)) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Status do pedido atualizado'
                ],
                'Pedido' => $data
            ];
            return $this->respond($response);
        };

        return $this->fail($model->errors());
    }




    public function deleteOrder($id = null)
    {
        $model = new OrderModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Pedido removido'
                ],
                'Order' => $data
            ];
            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Nenhum pedido encontrado com id ' . $id);
    }




    public function filterStatus()
    {
        $model = new OrderModel();
        $nome = $this->request->getGet('status');
        $client = $model->where('status', $nome)->findAll();
        return $this->respond($client);
    }
}
