<?php
/**
 * Created by PhpStorm.
 * User: rikosage
 * Date: 12/02/19
 * Time: 18:12
 */

namespace rikosage\NumberWordify;

use rikosage\NumberWordify\Unit\Currency\Rouble;

/**
 * Класс-обертка, для частоиспользуемых методов и форматов
 *
 * @package rikosage\NumberWordify
 */
class WordifyFacade
{
    /**
     * Возвращает число в виде строки прописью так, как обычно используется в документах.
     *
     * @param float $number
     * @return string
     */
    public static function toDocumentInRoubles($number)
    {
        list($real, $float) = explode('.', sprintf("%0.2f", round((float)($number), 2)));

        $formatter = new Formatter(new Rouble());
        $result = $formatter->asWords((int)$real);

        $result .= " {$float} коп.";

        return $result;
    }
}