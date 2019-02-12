<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 22:59
 */

namespace rikosage\NumberWords\Rank;

use rikosage\NumberWords\Base\BaseRank;

/**
 * Вспомогательные слова для разряда сотен.
 *
 * @package rikosage\NumberWords\Rank
 */
class Hundred extends BaseRank
{
    protected $words = [
        0 => '',
        1 => 'сто',
        2 => 'двести',
        3 => 'триста',
        4 => 'четыреста',
        5 => 'пятьсот',
        6 => 'шестьсот',
        7 => 'семьсот',
        8 => 'восемьсот',
        9 => 'девятьсот'
    ];
}