<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

// https://medium.com/geekculture/codeigniter-4-tutorial-restful-api-jwt-authentication-d5963d797ec4
class UserController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $users = new UserModel;
        return $this->respond(['Usuários' => $users->findAll()], 200);
    }




    public function deleteUser($id = null)
    {
        $model = new UserModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Usuário removido'
                ],
            ];
            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Nenhum usuário encontrado com id ' . $id);
    }




    // Filtro por email
    // http://localhost:8080/user/search?email=digiteAquiEmail
    public function filterStatus()
    {
        $model = new UserModel();
        $nome = $this->request->getGet('email');
        $client = $model->where('email', $nome)->findAll();
        return $this->respond($client);
    }




    public function showId($id = null)
    {
        $model = new UserModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum usuário encontrado com id ' . $id);
    }




    public function updateUser($id = null)
    {
        $model = new UserModel();
        $data = $this->request->getJSON();
        if (!$model->find($id)) {
            return $this->failNotFound('Nenhum usuário encontrado com id ' . $id);
        }
        if ($model->update($id, $data)) {
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'Dados atualizados'
                ],
                'User' => $data
            ];
            return $this->respondUpdated($response);
        } else {
            return $this->fail($model->errors());
        }
    }
}
