<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 15:44
 */

namespace rikosage\NumberWordify\Unit;

/**
 * Интерфейс для единиц измерения
 *
 * @package rikosage\NumberWordify\Unit
 */
interface UnitInterface
{
    /**
     * Получить род единиц измерения
     *
     * @return mixed
     */
    public function getGender();

    /**
     * Получить варианты для склонения
     *
     * @return mixed
     */
    public function getItems();
}