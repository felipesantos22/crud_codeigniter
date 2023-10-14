<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\PedidosProdutosModel;

class PedidoProdutoController extends BaseController
{
    use ResponseTrait;

    // Método para criar associações entre pedidos e produtos
    public function createOrderProduct()
    {
        $model = new PedidosProdutosModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Associação criada'
                ],
                'data' => $data
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }
}
