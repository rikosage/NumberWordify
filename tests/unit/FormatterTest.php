<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 17:47
 */

namespace rikosage\NumberWordify\tests\unit;

use PHPUnit\Framework\TestCase;
use rikosage\NumberWordify\Formatter;
use rikosage\NumberWordify\Unit\Currency\Rouble;

class FormatterTest extends TestCase
{
    /**
     * @dataProvider variantWithoutUnitProvider
     */
    public function testWordifyWithountUnit($number, $result)
    {
        $formatter = new Formatter();
        $this->assertEquals($formatter->asWords($number), $result);
    }

    /**
     * @dataProvider variantWithRoublesProvider
     */
    public function testWordifyWitRoubleUnit($number, $result)
    {
        $rouble = new Rouble();
        $formatter = new Formatter($rouble);
        $this->assertEquals($formatter->asWords($number), $result);
    }

    public function variantWithoutUnitProvider()
    {
        return [
            [1, 'один'],
            [2, 'два'],
            [10, 'десять'],
            [11, 'одиннадцать'],
            [22, 'двадцать два'],
            [38, 'тридцать восемь'],
            [110.57, 'сто десять'],
            [111, 'сто одиннадцать'],
            [1270, 'одна тысяча двести семьдесят'],
            [1281, 'одна тысяча двести восемьдесят один'],
            [9411354, 'девять миллионов четыреста одиннадцать тысяч триста пятьдесят четыре'],
            [1279577910, 'один миллиард двести семьдесят девять миллионов пятьсот семьдесят семь тысяч девятьсот десять'],
        ];
    }

    public function variantWithRoublesProvider()
    {
        return [
            [1, 'один рубль'],
            [2, 'два рубля'],
            [5, 'пять рублей'],
            [10, 'десять рублей'],
            [11, 'одиннадцать рублей'],
            [22, 'двадцать два рубля'],
            [38, 'тридцать восемь рублей'],
            [110, 'сто десять рублей'],
            [111, 'сто одиннадцать рублей'],
            [1271, 'одна тысяча двести семьдесят один рубль'],
            [1282, 'одна тысяча двести восемьдесят два рубля'],
            [9411354, 'девять миллионов четыреста одиннадцать тысяч триста пятьдесят четыре рубля'],
            [1279577910, 'один миллиард двести семьдесят девять миллионов пятьсот семьдесят семь тысяч девятьсот десять рублей'],
            [128.11, 'сто двадцать восемь рублей одиннадцать копеек'],
            [112.02, 'сто двенадцать рублей две копейки'],
            [93.71, 'девяносто три рубля семьдесят одна копейка'],
        ];
    }
}