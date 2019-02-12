<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:30
 */

namespace rikosage\NumberWords\Unit\Currency;

use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Unit\UnitInterface;

class Copeck implements UnitInterface
{
    public function getGender()
    {
        return Declinable::TYPE_FEMININE;
    }

    public function getItems()
    {
        return ['копейка', 'копейки', 'копеек'];
    }
}