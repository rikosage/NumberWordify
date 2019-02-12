<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 23:42
 */

namespace rikosage\NumberWords\Base;

use rikosage\NumberWords\Formatter;
use rikosage\NumberWords\Unit\UnitInterface;

/**
 * Основной компонент, выполняющий склонение числительных
 *
 * @package rikosage\NumberWords\Base
 */
class Morpher
{
    private $config = [
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
        Formatter::TRILLION_UNIT => [
            'gender' => Declinable::TYPE_MASCULINE,
            'items' => ['триллион', 'триллиона', 'триллионов'],
        ],
    ];

    /* @var UnitInterface|null */
    private $unit;

    /**
     * В конструктор передаются единицы измерения
     *
     * @param UnitInterface|null $unit
     */
    public function __construct(?UnitInterface $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Получить род единиц измерения
     *
     * @param int $kind
     * @return int
     */
    public function getUnitGender($kind)
    {
        if ($kind === Formatter::SINGLE_UNIT_ITEM) {
            return $this->unit ? $this->unit->getGender() : Declinable::TYPE_MASCULINE;
        }
        return $this->config[$kind]['gender'];
    }

    /**
     * Получить варианты для склонения
     *
     * @param int $kind
     * @return array
     */
    public function getUnitItems($kind) : array
    {
        if ($kind === Formatter::SINGLE_UNIT_ITEM) {
            return $this->unit ? $this->unit->getItems() : [];
        }
        return $this->config[$kind]['items'];
    }

    /**
     * Выбирает нужное склонение из возможных
     *
     * @param int $num
     * @param array $variants
     * @return string|null
     */
    public function morph(int $num, array $variants) : ?string
    {
        if (empty($variants)) {
            return null;
        }

        $cases = [2, 0, 1, 1, 1, 2];
        return $variants[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
    }

}