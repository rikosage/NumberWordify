<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 16:11
 */

namespace rikosage\NumberWords\Unit;


class NullUnit implements UnitInterface
{
    public function getGender()
    {
        return null;
    }

    public function getItems()
    {
        return [];
    }
}