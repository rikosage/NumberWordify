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

/**
 * Единица измерения: рубль
 *
 * @package rikosage\NumberWords\Unit\Currency
 */
class Rouble implements UnitInterface, DerivativeInterface
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
        return ['рубль', 'рубля', 'рублей'];
    }

    /**
     * @inheritdoc
     */
    public function getDerivative(): UnitInterface
    {
        return new Copeck();
    }
}