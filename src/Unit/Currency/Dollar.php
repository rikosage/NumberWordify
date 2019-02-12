<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 15:48
 */

namespace rikosage\NumberWords\Unit\Currency;

use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Unit\DerivativeInterface;
use rikosage\NumberWords\Unit\UnitInterface;

/**
 * Единица измерения: доллар
 *
 * @package rikosage\NumberWords\Unit\Currency
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