<?php

namespace App\Controllers;

use App\Data;
use App\Models\Product;
use App\Models\VarietyOption;
use App\View;

class ProductsController
{
    public function index(): View
    {
        $data = new Data();
        $items = $data->getItems();

        $products = [];
        foreach ($items as $item) {
            $products[] = new Product($item['code'], $item['description'], $item['varieties']);
        }

        return new View('Product/index.html', ['products' => $products]);
    }

    public function show(array $vars): View
    {
        $data = new Data();
        $items = $data->getItems();
        $varieties = $data->getVarieties();

        $product = null;
        foreach ($items as $item) {
            if ($item['code'] == $vars['id'])
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

        return new View('Product/show.html', ['product' => $product]);
    }

    public function generateSelectedItemCode(): View
    {
        $submittedInput = $_GET;
        $code = implode('.', $submittedInput);

        return new View('Product/code.html', ['code' => $code]);
    }
}