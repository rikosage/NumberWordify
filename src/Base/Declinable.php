<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 00:42
 */

namespace rikosage\NumberWordify\Base;

/**
 * Интерфейс для склоняемых разрядов\единиц
 * @package rikosage\NumberWordify\Base
 */
interface Declinable
{
    const TYPE_MASCULINE = 0;
    const TYPE_FEMININE = 1;

    /**
     * Установить род разряда\единицы
     *
     * @param string/int|null $gender
     * @return mixed
     */
    public function setGender($gender);
}