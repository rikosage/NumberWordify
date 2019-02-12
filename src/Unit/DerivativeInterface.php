<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:26
 */

namespace rikosage\NumberWords\Unit;

/**
 * Этот интерфейс должны наследовать единицы измерения, у которых есть специальные слова для дробной части.
 * Например, для рублей это копейки, для долларов - центы
 *
 * @package rikosage\NumberWords\Unit
 */
interface DerivativeInterface
{
    /**
     * @return UnitInterface Возвращает объект зависимых единиц измерения
     */
    public function getDerivative() : UnitInterface;
}