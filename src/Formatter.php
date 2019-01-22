<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 22/01/19
 * Time: 22:03
 */

namespace rikosage\NumberWords;

use rikosage\NumberWords\LocaleStrategy\RuLocaleStrategy;
use rikosage\NumberWords\Base\Declinable;
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

    public $locales = [
        'ru' => RuLocaleStrategy::class,
    ];

    /* @var Single */
    public $single;

    public $elevenToTwenty;

    public $tens;

    public $hundred;

    /**
     * @var RuLocaleStrategy
     */
    private $locale;

    public function __construct($locale = RuLocaleStrategy::class)
    {
        $this->locale = new $locale;

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

            $gender = $this->locale->getUnitGender($rank);
            $this->single->setGender($gender);

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

            $result[] = implode(" ", $innerResult) . " " . $this->locale->morph(
                $value,
                $this->locale->getUnitItems($rank)
            );
        }

        krsort($result);
        $result = array_map('trim', $result);

        return implode(" ", $result);
    }

}