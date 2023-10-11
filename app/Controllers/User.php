<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;


use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    public function createUser()
    {
        $model = new UserModel();
        $user = $model->save($this->request->getPost());
        return $this->respondCreated();
    }

    public function readUser()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // private $userModel;

    // public function __construct()
    // {
    //     $this->userModel = new \App\Models\UserModel();
    // }

    // public function read()
    // {
    //     // $model = new UserModel();
    //     // $data = $model ->findAll();
    //     // return $this->respond($data);
    //     $data = $this->userModel->findAll();
    //     return $this->response->setJSON($data);
    // }

    // public function create()
    // {
    //     $newUser = ['nome' => $this->request->getPost('nome')];
    //     $data = $this->userModel->insert($newUser);
    //     return $this->response->setJSON($data);
    // }
}
