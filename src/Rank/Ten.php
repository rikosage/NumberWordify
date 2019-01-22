<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 23:12
 */

namespace rikosage\NumberWords\Rank;

use rikosage\NumberWords\Base\BaseRank;

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