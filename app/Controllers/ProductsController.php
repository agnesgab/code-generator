<?php

namespace App\Controllers;

use App\Services\Product\Index\ProductIndexService;
use App\Services\Product\Show\ProductShowRequest;
use App\Services\Product\Show\ProductShowService;
use App\View;

class ProductsController
{
    public function index(): View
    {
        $service = new ProductIndexService();
        $response = $service->execute();

        return new View('Product/index.html', ['products' => $response->getProducts()]);
    }

    public function show(array $vars): View
    {
        $itemCode = (int)$vars['id'];
        $request = new ProductShowRequest($itemCode);
        $service = new ProductShowService();
        $response = $service->execute($request);

        return new View('Product/show.html', ['product' => $response->getProduct()]);
    }

    public function generateSelectedItemCode(): View
    {
        $code = implode('.', $_GET);

        return new View('Product/code.html', ['code' => $code]);
    }
}