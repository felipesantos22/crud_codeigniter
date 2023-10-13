<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\OrderModel;

class ClientController extends BaseController
{
    use ResponseTrait;

    //Create Client
    public function createClient()
    {
        $model = new ClientModel();
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




    // List All Client
    public function readClient()
    {
        $model = new ClientModel();
        $data = $model->findAll();
        return $this->respond($data);
    }




    // No seu controller
    public function showOrdersByClientId($clientId)
    {
        $clientModel = new ClientModel();
        $client = $clientModel->find($clientId);

        if (!$client) {
            return $this->failNotFound('Cliente não encontrado com ID ' . $clientId);
        }

        // Carregar os pedidos associados a este cliente
        $orderModel = new OrderModel();
        $orders = $orderModel->where('client_id', $clientId)->findAll();

        $data = [
            'cliente' => $client,
            'pedidos' => $orders
        ];

        return $this->respond($data);
    }


    

    // List Client By Id
    public function showId($id = null)
    {
        $model = new ClientModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }




    // Update Client
    public function updateClient($id = null)
    {
        $model = new ClientModel();
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
            return $this->respondUpdated($response);
        } else {
            return $this->fail($model->errors());
        }
    }




    // Delete Client
    public function deleteClient($id = null)
    {
        $model = new ClientModel();
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
    //http://localhost:8080/product/search?nome=digiteONomeAqui
    public function filterName()
    {
        $model = new ClientModel();
        $nome = $this->request->getGet('nome');
        $client = $model->where('nome', $nome)->findAll();
        return $this->respond($client);
    }





    // Url para definir o número da página
    //http://localhost:8080/client/paginated?page=1

    // Url para definir a página e quantos items por página
    //http://localhost:8080/client/paginated?page=1&per_page=3
    public function paginated()
    {
        $model = new ClientModel();
        $perPage = $this->request->getVar('per_page');
        $page = $this->request->getVar('page');
        $offSet = ($page - 1) * $perPage;
        $client = $model->paginate($perPage, 'default', $offSet);
        return $this->respond($client);
    }





    // Está é uma maneira mais simples de fazer páginação, porém só conseguimos controlar
    // o número de items pela URL.
    // Pelos testes que fiz não é levado em consideração a variável perPage em Pager.php

    // Link para documentação.
    // https://www.codeigniter.com/user_guide/libraries/pagination.html

    // Como acessar a url
    // http://localhost:8080/client?page=2
    public function page()
    {
        $model = new ClientModel();
        $data = [
            'user' => $model->paginate(5),
            'pager' => $model->pager,
        ];
        return $this->respond($data);
    }
}
