<?php

namespace App\Services\Product\Index;

use App\Models\Product;
use App\Repositories\Product\JsonProductRepository;
use App\Repositories\Product\ProductRepository;

class ProductIndexService {

    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new JsonProductRepository();
    }

    public function execute()
    {
        $items = $this->productRepository->index();
        $products = [];
        foreach ($items as $item) {
            $products[] = new Product($item['code'], $item['description'], $item['varieties']);
        }

        return new ProductIndexResponse($products);
    }

}