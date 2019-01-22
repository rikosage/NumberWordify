<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 00:42
 */

namespace rikosage\NumberWords\Base;


interface Declinable
{
    const TYPE_MASCULINE = 0;
    const TYPE_FEMININE = 1;

    public function setGender(string $gender);
}