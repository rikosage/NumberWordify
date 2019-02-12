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

/**
 * Единица измерения: цент
 * @package rikosage\NumberWords\Unit\Currency
 */
class Cent implements UnitInterface
{
    /**
     * @inheritdoc
     */
    public function getGender()
    {
        return Declinable::TYPE_MASCULINE;
    }

    /**
     * @inheritdoc
     */
    public function getItems()
    {
        return ['цент', 'цента', 'центов'];
    }
}