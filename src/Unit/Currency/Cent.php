<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:33
 */

namespace rikosage\NumberWordify\Unit\Currency;

use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Unit\UnitInterface;

/**
 * Единица измерения: цент
 * @package rikosage\NumberWordify\Unit\Currency
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