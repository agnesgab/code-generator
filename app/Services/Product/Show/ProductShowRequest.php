<?php

namespace App\Services\Product\Show;

class ProductShowRequest
{
    private int $code;

    public function __construct(int $code)
    {
        $this->code = $code;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}