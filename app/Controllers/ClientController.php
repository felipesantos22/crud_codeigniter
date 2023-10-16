<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\OrderModel;

class ClientController extends BaseController
{
    use ResponseTrait;

    public function createClient()
    {
        $model = new ClientModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'messages' => [
                    'Success' => 'Dados salvos'
                ],
                'Client' => $data
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }




    public function readClient()
    {
        $model = new ClientModel();
        $data = $model->findAll();
        return $this->respond($data);
    }




    // No seu controller
    // Rota para imprimir clientes com os pedidos
    // http://localhost:8080/cliente/showOrdersByClientId/1
    public function showOrdersByClientId($clienteId)
    {
        $clienteModel = new ClientModel();
        $cliente = $clienteModel->find($clienteId);

        if (!$cliente) {
            return $this->failNotFound('Cliente não encontrado com ID ' . $clienteId);
        }

        // Carregar os pedidos associados a este cliente
        $pedidoModel = new OrderModel();
        $pedido = $pedidoModel->where('cliente_id', $clienteId)->findAll();

        $data = [
            'cliente' => $cliente,
            'pedidos' => $pedido
        ];

        return $this->respond($data);
    }




    // Filtrar id
    public function showId($id = null)
    {
        $model = new ClientModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum cliente encontrado com id ' . $id);
    }




    public function updateClient($id = null)
    {
        $model = new ClientModel();
        $data = $this->request->getJSON();
        if (!$model->find($id)) {
            return $this->failNotFound('Nenhum cliente encontrado com id ' . $id);
        }
        if ($model->update($id, $data)) {
            $response = [
                'status'   => 200,
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




    public function deleteClient($id = null)
    {
        $model = new ClientModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Cliente removido'
                ],
                'Cliente' => $data
            ];
            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Nenhum cliente encontrado com id ' . $id);
    }




    //Filtrar nomes
    //http://localhost:8080/produto/search?nome=digiteONomeAqui
    public function filterName()
    {
        $model = new ClientModel();
        $nome = $this->request->getGet('nome');
        $client = $model->where('nome', $nome)->findAll();
        return $this->respond($client);
    }





    // Url para definir o número da página
    //http://localhost:8080/cliente/paginated?page=1

    // Url para definir a página e quantos items por página
    //http://localhost:8080/cliente/paginated?page=1&per_page=3

    // Link para documentação.
    // https://www.codeigniter.com/user_guide/libraries/pagination.html
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
    // http://localhost:8080/cliente?page=2
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
