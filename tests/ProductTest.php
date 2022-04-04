<?php

namespace Tests;

use App\Models\Product;
use App\Models\VarietyOption;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testPossibleToGetItemCode()
    {
        $item = new Product('1111', 'Beisbola cepure', ['COLOR']);
        $this->assertEquals('1111', $item->getItemCode());
    }

    public function testCanGetRequiredItemVarieties()
    {
        $item = new Product('1111', 'Beisbola cepure', ['COLOR']);
        $this->assertEquals(['COLOR'], $item->getRequiredVarieties());
    }

    public function testCanGetItemDescription()
    {
        $item = new Product('1111', 'Beisbola cepure', ['COLOR']);
        $this->assertEquals('Beisbola cepure', $item->getItemDescription());
    }

    public function testCanSetAndGetVarietyOptions()
    {
        $item = new Product('1111', 'Beisbola cepure', ['COLOR']);
        $varietyOption = new VarietyOption('COLOR', [['code'=>'WHI', 'description'=>'Balts'],['code'=>'YEL','description'=>'Dzeltens']], 'krāsa');
        $item->setVarietyOptions($varietyOption);
        $this->assertEquals([new VarietyOption('COLOR', [['code'=>'WHI', 'description'=>'Balts'],['code'=>'YEL','description'=>'Dzeltens']], 'krāsa')], $item->getOptions());
    }
}
