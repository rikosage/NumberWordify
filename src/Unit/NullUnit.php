<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:11
 */

namespace rikosage\NumberWords\Unit;

/**
 * Вспомогательные единицы измерения. Используются в случае, если они не нужны вообще.
 *
 * @package rikosage\NumberWords\Unit
 */
class NullUnit implements UnitInterface
{
    /**
     * @inheritdoc
     */
    public function getGender()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getItems()
    {
        return [];
    }
}