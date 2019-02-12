<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 23:12
 */

namespace rikosage\NumberWordify\Rank;

use rikosage\NumberWordify\Base\BaseRank;

/**
 * Вспомогательные слова для разряда десятков
 * @package rikosage\NumberWordify\Rank
 */
class Ten extends BaseRank
{
    protected $words = [
        0 => '',
        1 => '',
        2 => 'двадцать',
        3 => 'тридцать',
        4 => 'сорок',
        5 => 'пятьдесят',
        6 => 'шестьдесят',
        7 => 'семьдесят',
        8 => 'восемьдесят',
        9 => 'девяносто'
    ];
}