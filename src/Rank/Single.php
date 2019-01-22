<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 00:43
 */

namespace rikosage\NumberWords\Rank;


use rikosage\NumberWords\Base\Declinable;
use rikosage\NumberWords\Base\BaseRank;

class Single extends BaseRank implements Declinable
{
    private $gender;

    private $genderMethodMap = [
        Declinable::TYPE_MASCULINE => 'getMasculineVariants',
        Declinable::TYPE_FEMININE => 'getFeminineVariant',
    ];

    protected $words = [
        0 => '',
        1 => 'один',
        2 => 'два',
        3 => 'три',
        4 => 'четыре',
        5 => 'пять',
        6 => 'шесть',
        7 => 'семь',
        8 => 'восемь',
        9 => 'девять',
    ];

    public function getWord($key): string
    {
        $dependent = call_user_func([$this, $this->genderMethodMap[$this->gender]]);
        return isset($dependent[$key]) ? $dependent[$key] : $this->words[$key];

    }

    public function setGender(string $gender)
    {
        $this->gender = $gender;
    }

    private function getMasculineVariants()
    {
        return [1 => 'один', 2 => 'два'];
    }

    private function getFeminineVariant()
    {
        return [1 => 'одна', 2 => 'две'];
    }
}