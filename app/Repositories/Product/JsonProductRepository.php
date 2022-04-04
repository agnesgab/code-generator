<?php

namespace App\Repositories\Product;

use App\Data;

class JsonProductRepository implements ProductRepository
{

    public function index()
    {
        $data = new Data();
        return $data->getItems();
    }

    public function show(): Data
    {
        return new Data();
    }


}

