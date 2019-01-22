<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 23:42
 */

namespace rikosage\NumberWords\LocaleStrategy;


use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Formatter;

class RuLocaleStrategy
{
    public static function getUnits()
    {
        return [
            Formatter::SINGLE_UNIT_ITEM => [
                'gender' => Declinable::TYPE_MASCULINE,
                'items' => ['рубль', 'рубля', 'рублей'],
            ],
            Formatter::THOUSAND_UNIT_ITEM => [
                'gender' => Declinable::TYPE_FEMININE,
                'items' => ['тысяча', 'тысячи', 'тысяч'],
            ],
            Formatter::MILLION_UNIT => [
                'gender' => Declinable::TYPE_MASCULINE,
                'items' => ['миллион', 'миллиона', 'миллионов'],
            ],
            Formatter::BILLION_UNIT => [
                'gender' => Declinable::TYPE_MASCULINE,
                'items' => ['миллиард', 'милиарда', 'миллиардов'],
            ],
        ];
    }

    public function getUnitGender($kind)
    {
        return static::getUnits()[$kind]['gender'];
    }

    public function getUnitItems($kind)
    {
        return static::getUnits()[$kind]['items'];
    }

    public function morph (int $num, array $titles)
    {
        $cases = [2, 0, 1, 1, 1, 2];
        return $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
    }
}