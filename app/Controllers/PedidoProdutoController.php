<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PedidosProdutosModel;
use App\Models\ProdutoModel;

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

    // Função para buscar pedidos com seus produtos
    // Exemplo de rota
    // http://localhost:8080/order/pedidoComProdutos/2
    public function pedidoComProdutos($pedidoId)
    {
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->find($pedidoId);

        if (!$pedido) {
            return $this->failNotFound('Pedido não encontrado com ID ' . $pedido);
        }

        // Carregar os produtos associados a este pedido
        $produtoModel = new ProdutoModel();
        $produtos = $produtoModel->where('nome', $pedidoId)->findAll();

        $data = [
            'pedido' => $pedido,
            'produtos' => $produtos
        ];

        return $this->respond($data);
    }
}
