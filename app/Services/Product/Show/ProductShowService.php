<?php

namespace App\Services\Product\Show;

use App\Models\Product;
use App\Models\VarietyOption;
use App\Repositories\Product\JsonProductRepository;
use App\Repositories\Product\ProductRepository;

class ProductShowService
{

    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new JsonProductRepository();
    }

    public function execute(ProductShowRequest $request)
    {
        $data = $this->productRepository->show();
        $items = $data->getItems();
        $varieties = $data->getVarieties();

        $product = null;
        foreach ($items as $item) {
            if ($item['code'] == $request->getCode())
                $product = new Product($item['code'], $item['description'], $item['varieties']);
        }

        $productVarietyOptions = [];
        foreach ($varieties as $variety) {
            foreach ($product->getRequiredVarieties() as $value) {
                if ($value == $variety['code']) {
                    $productVarietyOptions[] = $variety;
                }
            }
        }

        sort($productVarietyOptions);
        foreach ($productVarietyOptions as $varietyOption) {
            $product->setVarietyOptions(new VarietyOption($varietyOption['code'], $varietyOption['options'], $varietyOption['description']));
        }

        return new ProductShowResponse($product);

    }
}