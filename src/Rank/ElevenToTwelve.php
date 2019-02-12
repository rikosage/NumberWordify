<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 22:56
 */

namespace rikosage\NumberWords\Rank;

use rikosage\NumberWords\Base\BaseRank;

/**
 * Вспомогательные слова между 10 и 19.
 *
 * @package rikosage\NumberWords\Rank
 */
class ElevenToTwelve extends BaseRank
{
    protected $words = [
        0 => 'десять',
        1 => 'одиннадцать',
        2 => 'двенадцать',
        3 => 'тринадцать',
        4 => 'четырнадцать',
        5 => 'пятнадцать',
        6 => 'шестнадцать',
        7 => 'семнадцать',
        8 => 'восемнадцать',
        9 => 'девятнадцать'
    ];
}