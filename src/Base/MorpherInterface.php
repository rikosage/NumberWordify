<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 01:27
 */

namespace rikosage\NumberWords\Base;


interface MorpherInterface
{
    public function morph(int $num, array $variants) : string;
}