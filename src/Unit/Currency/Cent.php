<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:33
 */

namespace rikosage\NumberWords\Unit\Currency;

use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Unit\UnitInterface;

class Cent implements UnitInterface
{
    public function getGender()
    {
        return Declinable::TYPE_MASCULINE;
    }

    public function getItems()
    {
        return ['цент', 'цента', 'центов'];
    }
}