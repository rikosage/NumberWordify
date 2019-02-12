<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 17:26
 */

namespace rikosage\NumberWordify\tests\unit;

use PHPUnit\Framework\TestCase;
use rikosage\NumberWordify\Base\Declinable;
use rikosage\NumberWordify\Rank\Single;

class SingleRankTest extends TestCase
{
    public function testDeclinableWords()
    {
        $rank = new Single();
        $rank->setGender(Declinable::TYPE_MASCULINE);
        $this->assertEquals($rank->getWord(1), "один");
        $this->assertEquals($rank->getWord(2), "два");

        $rank->setGender(Declinable::TYPE_FEMININE);
        $this->assertEquals($rank->getWord(1), "одна");
        $this->assertEquals($rank->getWord(2), "две");
    }
}