<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 17:32
 */

namespace rikosage\NumberWords\tests\unit;

use PHPUnit\Framework\TestCase;
use rikosage\NumberWords\Unit\Currency\Cent;
use rikosage\NumberWords\Unit\Currency\Copeck;
use rikosage\NumberWords\Unit\Currency\Dollar;
use rikosage\NumberWords\Unit\Currency\Hryvnia;
use rikosage\NumberWords\Unit\Currency\Rouble;

class CurrencyTest extends TestCase
{
    public function testDerivative()
    {
        $dollar = new Dollar();
        $this->assertEquals(get_class($dollar->getDerivative()), Cent::class);

        $rouble = new Rouble();
        $this->assertEquals(get_class($rouble->getDerivative()), Copeck::class);

        $hryvnia = new Hryvnia();
        $this->assertEquals(get_class($hryvnia->getDerivative()), Copeck::class);

        $this->assertEquals(get_class($rouble->getDerivative()), get_class($hryvnia->getDerivative()));
    }
}