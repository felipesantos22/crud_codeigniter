<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ClientModel;

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
}
