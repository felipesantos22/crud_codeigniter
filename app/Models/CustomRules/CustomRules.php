<?php

namespace App\Models\CustomRules;

use App\Models\ClientModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class CustomRules
{

    public function is_valid_client_id(int $id): bool
    {
        $model = new ClientModel();
        $client = $model->find($id);
        return $client == null ? false : true;
    }

    public function is_valid_order_id(int $id): bool
    {
        $model = new OrderModel();
        $order = $model->find($id);
        return $order == null ? false : true;
    }

    public function is_valid_product_id(int $id): bool
    {
        $model = new ProductModel();
        $product = $model->find($id);
        return $product == null ? false : true;
    }
}
