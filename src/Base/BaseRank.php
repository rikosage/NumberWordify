<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 00:52
 */

namespace rikosage\NumberWords\Base;


abstract class BaseRank
{
    protected $words = [];

    public function getWord($key) : string
    {
        return $this->words[$key];
    }
}