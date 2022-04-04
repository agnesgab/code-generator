<?php

namespace Tests;

use App\Models\VarietyOption;
use PHPUnit\Framework\TestCase;

class VarietyOptionTest extends TestCase
{
    public function testCanGetOptions()
    {
        $varietyOption = new VarietyOption('COLOR', [['code'=>'WHI', 'description'=>'Balts'],['code'=>'YEL','description'=>'Dzeltens']], 'krāsa');
        $this->assertEquals([['code'=>'WHI', 'description'=>'Balts'], ['code'=>'YEL', 'description'=>'Dzeltens']], $varietyOption->getVarietyOptions());
    }

    public function testCanGetOptionsOfSizesAndColors()
    {
        $varietyOption = new VarietyOption('COLOR', [['code'=>'WHI', 'description'=>'Balts'],['code'=>'YEL','description'=>'Dzeltens']], 'Krāsa');
        $this->assertEquals(['WHI'=>['Balts'],'YEL'=>['Dzeltens']], $varietyOption->getColorsAndSizes());
    }
}
