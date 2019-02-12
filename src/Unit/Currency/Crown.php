<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:06
 */

namespace rikosage\NumberWords\Unit\Currency;


use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Unit\UnitInterface;

class Crown implements UnitInterface
{

    public function getGender()
    {
        return Declinable::TYPE_FEMININE;
    }

    public function getItems()
    {
        return ['крона', 'кроны', 'крон'];
    }
}