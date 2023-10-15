<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PedidosProdutosModel;
use App\Models\ProdutoModel;
use Exception;

class PedidoProdutoController extends BaseController
{
    use ResponseTrait;

    // Método para criar associações entre pedidos e produtos
    // Como as FK são passadas diretamente pelo corpo da requisição, foi preciso tratar o erro na
    // model e na controller
    public function createOrderProduct()
    {
        try {
            $model = new PedidosProdutosModel();
            $data = $this->request->getJSON();

            if ($model->insert($data)) {
                $response = [
                    'status'   => 201,
                    'messages' => [
                        'Success' => 'Associação criada'
                    ],
                    'data' => $data
                ];
                return $this->respondCreated($response);
            }
        } catch (Exception $e) {
            $response = [
                'status'   => 404,
                'messages' => [
                    'Error' => 'Pedido_id ou Produto_id inválido'
                ],
            ];
            return $this->respond($response, 404);
        }
    }


    

    // Função para buscar pedidos com seus produtos
    // Exemplo de rota
    // http://localhost:8080/order/pedidoComProdutos/2
    public function pedidoComProdutos($pedidoId)
    {
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->find($pedidoId);

        if (!$pedido) {
            return $this->failNotFound('Pedido não encontrado com ID ' . $pedidoId);
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




    // Função para buscar produtos e seus pedidos
    // Exemplo de rota
    // http://localhost:8080/order/produtosComPedidos/2
    public function produtosComPedidos($produtoId)
    {
        $produtoModel = new ProdutoModel();
        $produto = $produtoModel->find($produtoId);

        if (!$produto) {
            return $this->failNotFound('Pedido não encontrado com ID ' . $produtoId);
        }

        // Carregar os produtos associados a este pedido
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->where('id', $produtoId)->findAll();

        $data = [
            'produto' => $produto,
            'pedidos' => $pedidos
        ];

        return $this->respond($data);
    }
}
