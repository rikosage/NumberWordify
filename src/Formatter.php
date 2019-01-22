<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 22:03
 */

namespace rikosage\NumberWords;

use rikosage\NumberWords\Base\BaseRank;
use rikosage\NumberWords\Morpher\RuMorpher;
use rikosage\NumberWords\Rank\ElevenToTwelve;
use rikosage\NumberWords\Rank\Hundred;
use rikosage\NumberWords\Rank\Single;
use rikosage\NumberWords\Rank\Ten;

class Formatter
{
    const SINGLE_UNIT_ITEM = 0;
    const THOUSAND_UNIT_ITEM = 1;
    const MILLION_UNIT = 2;
    const BILLION_UNIT = 3;

    /* @var BaseRank */
    public $single;

    /* @var BaseRank */
    public $elevenToTwenty;

    /* @var BaseRank */
    public $tens;

    /* @var BaseRank */
    public $hundred;

    /**
     * @var RuMorpher
     */
    private $morpher;

    public function __construct($locale = RuMorpher::class)
    {
        $this->morpher = new $locale;

        $this->hundred =new Hundred();
        $this->elevenToTwenty = new ElevenToTwelve();
        $this->tens = new Ten();
        $this->single = new Single();
    }

    public function asWords($number) : string
    {
        list($real, $float) = explode('.', sprintf("%0.2f", round((float)($number), 2)));

        if (!(int)$float) {
            $float = "00";
        }

        $ranks = str_split(strrev($real), 3);
        $ranks = array_map('strrev', $ranks);
        $result = [];

        foreach ($ranks as $rank => $value) {

            $innerResult = [];

            $innerRank = str_split($value);
            for ($i = count($innerRank); $i < 3; $i++) {
                array_unshift($innerRank, 0);
            }
            list($hundred, $ten, $single) = $innerRank;

            $innerResult[] = $this->hundred->getWord($hundred);

            $this->single->setGender(
                $this->morpher->getUnitGender($rank)
            );

            if ($ten == 1) {
                $innerResult[] = $this->elevenToTwenty->getWord($ten);
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
                $this->morpher->morph($value, $this->morpher->getUnitItems($rank))
            ]);
        }

        krsort($result);
        $result = array_map('trim', $result);

        return implode(" ", $result);
    }

}