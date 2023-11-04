<?php

namespace App\Models\CustomRules;

use App\Models\ClientModel;

class CustomRules
{

    public function is_valid_client_id(int $id): bool
    {
        $model = new ClientModel();
        $client = $model->find($id);
        return $client == null ? false : true;
    }

    public function is_valid_order_id(){

    }

    public function is_valid_product_id(){

    }
}
