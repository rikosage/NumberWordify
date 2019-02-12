<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 22:03
 */

namespace rikosage\NumberWords;

use rikosage\NumberWords\Base\BaseRank;
use rikosage\NumberWords\Base\Morpher;
use rikosage\NumberWords\Rank\ElevenToTwelve;
use rikosage\NumberWords\Rank\Hundred;
use rikosage\NumberWords\Rank\Single;
use rikosage\NumberWords\Rank\Ten;
use rikosage\NumberWords\Unit\DerivativeInterface;
use rikosage\NumberWords\Unit\NullUnit;
use rikosage\NumberWords\Unit\UnitInterface;

/**
 * Основной компонент библиотеки с методами сборки числа по разрядам.
 *
 * @package rikosage\NumberWords
 */
class Formatter
{
    const SINGLE_UNIT_ITEM = 0;
    const THOUSAND_UNIT_ITEM = 1;
    const MILLION_UNIT = 2;
    const BILLION_UNIT = 3;
    const TRILLION_UNIT = 4;

    /* @var BaseRank */
    public $single;

    /* @var BaseRank */
    public $elevenToTwenty;

    /* @var BaseRank */
    public $tens;

    /* @var BaseRank */
    public $hundred;

    /* @var UnitInterface|DerivativeInterface */
    private $unit;

    /**
     * Formatter constructor.
     * @param UnitInterface|null $unit Единицы измерения
     */
    public function __construct(UnitInterface $unit = null)
    {
        $this->unit = $unit ?: new NullUnit();

        $this->hundred = new Hundred();
        $this->elevenToTwenty = new ElevenToTwelve();
        $this->tens = new Ten();
        $this->single = new Single();
    }

    /**
     * @param number $number Число для перевода
     * @return string Число словами
     */
    public function asWords($number) : string
    {
        list($real, $float) = explode('.', sprintf("%0.2f", round((float)($number), 2)));

        $string = $this->process($real);

        if ((int)$float && $this->unit instanceof DerivativeInterface) {
            $string .= " " . $this->process((int)$float, $this->unit->getDerivative());
        }

        return $string;
    }

    /**
     * Выполняет разбиение числа по разрядам, и переводит каждый разряд в слова
     *
     * @param int $number
     * @param UnitInterface|null $derivative
     * @return string
     */
    protected function process(int $number, ?UnitInterface $derivative = null)
    {
        $morpher = new Morpher($derivative ?: $this->unit);

        $ranks = str_split(strrev($number), 3);
        $ranks = array_map('strrev', $ranks);
        $result = [];

        foreach ($ranks as $rank => $value) {

            if ($value === "000") {
                continue;
            }

            $innerResult = [];

            $innerRank = str_split($value);
            for ($i = count($innerRank); $i < 3; $i++) {
                array_unshift($innerRank, 0);
            }

            list($hundred, $ten, $single) = $innerRank;
            $innerResult[] = $this->hundred->getWord($hundred);

            $this->single->setGender($morpher->getUnitGender($rank));

            if ($ten == 1) {
                $innerResult[] = $this->elevenToTwenty->getWord($single);
            } else {
                $innerResult[] = $this->tens->getWord($ten);
                $innerResult[] = $this->single->getWord($single);
            }

            if (empty ($innerResult)) {
                continue;
            }

            $innerResult = array_filter($innerResult, function($item){
                return (bool)$item;
            });

            $result[] = vsprintf("%s %s", [
                implode(" ", $innerResult),
                $morpher->morph($value, $morpher->getUnitItems($rank))
            ]);
        }

        krsort($result);
        return implode(" ", array_map('trim', $result));
    }

}