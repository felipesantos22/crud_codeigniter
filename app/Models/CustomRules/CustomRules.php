<?php

namespace App\Models\CustomRules;

use App\Models\ClientModel;

class CustomRules
{

    public function is_valid_id(int $id): bool
    {
        $model = new ClientModel();
        $client = $model->find($id);
        return $client == null ? false : true;
    }
}
