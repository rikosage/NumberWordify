<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 23/01/19
 * Time: 00:43
 */

namespace rikosage\NumberWordify\Rank;


use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Base\BaseRank;

/**
 * Вспомогательные слова для разряда единиц.
 * @package rikosage\NumberWordify\Rank
 */
class Single extends BaseRank implements Declinable
{
    /* @var int */
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

    /**
     * @inheritdoc
     */
    public function getWord($key): string
    {
        if (!$this->gender) {
            return $this->words[$key];
        }
        $dependent = call_user_func([$this, $this->genderMethodMap[$this->gender]]);
        return isset($dependent[$key]) ? $dependent[$key] : $this->words[$key];

    }

    /**
     * @inheritdoc
     */
    public function setGender(?string $gender)
    {
        $this->gender = $gender;
    }

    /**
     * Склонения для зависимых чисел в мужском роде
     *
     * @return array
     */
    private function getMasculineVariants()
    {
        return [1 => 'один', 2 => 'два'];
    }

    /**
     * Склонения для зависимых чисел в женском роде
     *
     * @return array
     */
    private function getFeminineVariant()
    {
        return [1 => 'одна', 2 => 'две'];
    }
}