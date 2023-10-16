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
}