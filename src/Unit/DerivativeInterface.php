<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:26
 */

namespace rikosage\NumberWords\Unit;


interface DerivativeInterface
{
    public function getDerivative() : UnitInterface;
}