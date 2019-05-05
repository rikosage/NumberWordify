<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:06
 */

namespace rikosage\NumberWordify\Unit\Currency;


use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Unit\DerivativeInterface;
use rikosage\NumberWordify\Unit\UnitInterface;

/**
 * Единица измерения: гривна
 *
 * @package rikosage\NumberWordify\Unit\Currency
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
        return ['гривна', 'гривны', 'гривен'];
    }

    /**
     * @inheritdoc
     */
    public function getDerivative(): UnitInterface
    {
        return new Copeck();
    }
}
