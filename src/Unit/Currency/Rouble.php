<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 15:44
 */

namespace rikosage\NumberWordify\Unit\Currency;

use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Unit\DerivativeInterface;
use rikosage\NumberWordify\Unit\UnitInterface;

/**
 * Единица измерения: рубль
 *
 * @package rikosage\NumberWordify\Unit\Currency
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