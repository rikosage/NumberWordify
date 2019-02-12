<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 15:44
 */

namespace rikosage\NumberWords\Unit\Currency;

use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Unit\DerivativeInterface;
use rikosage\NumberWords\Unit\UnitInterface;

class Rouble implements UnitInterface, DerivativeInterface
{
    public function getGender()
    {
        return Declinable::TYPE_MASCULINE;
    }

    public function getItems()
    {
        return ['рубль', 'рубля', 'рублей'];
    }

    public function getDerivative(): UnitInterface
    {
        return new Copeck();
    }
}