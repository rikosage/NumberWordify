<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:30
 */

namespace rikosage\NumberWordify\Unit\Currency;

use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Unit\UnitInterface;

/**
 * Единица измерения: копейка
 *
 * @package rikosage\NumberWordify\Unit\Currency
 */
class Copeck implements UnitInterface
{
    /**
     * @inheritdoc
     */
    public function getGender()
    {
        return Declinable::TYPE_FEMININE;
    }

    /**
     * @inheritdoc
     */
    public function getItems()
    {
        return ['копейка', 'копейки', 'копеек'];
    }
}