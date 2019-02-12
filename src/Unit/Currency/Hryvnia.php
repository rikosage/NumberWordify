<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:06
 */

namespace rikosage\NumberWords\Unit\Currency;


use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Unit\DerivativeInterface;
use rikosage\NumberWords\Unit\UnitInterface;

/**
 * Единица измерения: гривна
 *
 * @package rikosage\NumberWords\Unit\Currency
 */
class Hryvnia implements UnitInterface, DerivativeInterface
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
        return ['крона', 'кроны', 'крон'];
    }

    /**
     * @inheritdoc
     */
    public function getDerivative(): UnitInterface
    {
        return new Copeck();
    }
}