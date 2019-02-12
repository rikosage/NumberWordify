<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 15:48
 */

namespace rikosage\NumberWordify\Unit\Currency;

use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Unit\DerivativeInterface;
use rikosage\NumberWordify\Unit\UnitInterface;

/**
 * Единица измерения: доллар
 *
 * @package rikosage\NumberWordify\Unit\Currency
 */
class Dollar implements UnitInterface, DerivativeInterface
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
        return ['доллар', 'доллара', 'долларов'];
    }

    /**
     * @inheritdoc
     */
    public function getDerivative(): UnitInterface
    {
        return new Cent();
    }
}