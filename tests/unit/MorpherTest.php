<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 17:37
 */

namespace rikosage\NumberWords\tests\unit;

use PHPUnit\Framework\TestCase;
use rikosage\NumberWords\Base\Morpher;
use rikosage\NumberWords\Unit\Currency\Rouble;
use rikosage\NumberWords\Unit\NullUnit;

class MorpherTest extends TestCase
{
    public function testMorph()
    {
        $data = ['тысяча', 'тысячи', 'тысяч'];
        $morpher = new Morpher(new NullUnit());

        $this->assertEquals($morpher->morph(1, $data), "тысяча");
        $this->assertEquals($morpher->morph(2, $data), "тысячи");
        $this->assertEquals($morpher->morph(4, $data), "тысячи");
        $this->assertEquals($morpher->morph(5, $data), "тысяч");
        $this->assertEquals($morpher->morph(11, $data), "тысяч");
        $this->assertEquals($morpher->morph(21, $data), "тысяча");
        $this->assertEquals($morpher->morph(22, $data), "тысячи");
        $this->assertEquals($morpher->morph(24, $data), "тысячи");

        $rouble = new Rouble();
        $morpher = new Morpher($rouble);

        $this->assertEquals($morpher->morph(1, $rouble->getItems()), "рубль");
        $this->assertEquals($morpher->morph(2, $rouble->getItems()), "рубля");
        $this->assertEquals($morpher->morph(3, $rouble->getItems()), "рубля");
        $this->assertEquals($morpher->morph(5, $rouble->getItems()), "рублей");
        $this->assertEquals($morpher->morph(11, $rouble->getItems()), "рублей");
        $this->assertEquals($morpher->morph(21, $rouble->getItems()), "рубль");
        $this->assertEquals($morpher->morph(22, $rouble->getItems()), "рубля");
        $this->assertEquals($morpher->morph(24, $rouble->getItems()), "рубля");
        $this->assertEquals($morpher->morph(28, $rouble->getItems()), "рублей");
    }
}