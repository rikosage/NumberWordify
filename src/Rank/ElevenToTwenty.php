<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 22:56
 */

namespace rikosage\NumberWordify\Rank;

use rikosage\NumberWordify\Base\BaseRank;

/**
 * Вспомогательные слова между 10 и 19.
 *
 * @package rikosage\NumberWordify\Rank
 */
class ElevenToTwenty extends BaseRank
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