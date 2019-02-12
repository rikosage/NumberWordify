<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 00:52
 */

namespace rikosage\NumberWords\Base;

/**
 * Class BaseRank реализует базовое хранилище склоняемых слов и метод для их получения
 * @package rikosage\NumberWords\Base
 */
abstract class BaseRank
{
    protected $words = [];

    /**
     * @param $key
     * @return string
     */
    public function getWord($key) : string
    {
        return $this->words[$key];
    }
}