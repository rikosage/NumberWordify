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

/**
 * Единица измерения: копейка
 *
 * @package rikosage\NumberWords\Unit\Currency
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