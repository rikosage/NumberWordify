[![Build Status](https://scrutinizer-ci.com/g/rikosage/NumberWordify/badges/build.png?b=master)](https://scrutinizer-ci.com/g/rikosage/NumberWordify/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/rikosage/NumberWordify/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rikosage/NumberWordify/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rikosage/NumberWordify/?branch=master)

# NumberWordify

Расширяемая библиотека для перевода числа из цифр в слова прописью. Время от времени используется в различных документах. Предполагается использовать для работы с валютами, или любыми другими единицами измерений, где требуется сумма прописью.

Пул-реквесты принимаются, рекомендуется расширять класс `rikosage\NumberWordify\WordifyFacade`, а так же классы новых единиц измерения (килограммы, метры, градусы), если требуется.

[Посмотреть онлайн](https://number-string-site.herokuapp.com/)


## Установка

Установка производится через composer:
```bash
composer require rikosage/number-wordify
```

Либо необходимо добавить библиотеку в require-секцию файла `composer.json`:

```
"require": {
    "rikosage/number-wordify": "*",
  },
```

## Примеры использования

*Без использования единиц измерения (десятичная часть не учитывается)*

```php
use rikosage\NumberWordify\Formatter as Wordify;

$wordify = new Wordify();
echo $wordify->asWords(832654); 
//восемьсот тридцать две тысячи шестьсот пятьдесят четыре
``` 

*Использование валют*

```php
use rikosage\NumberWordify\Formatter as Wordify;
use rikosage\NumberWordify\Unit\Currency\Rouble;

$wordify = new Wordify(new Rouble());
echo $wordify->asWords(911443.31);
//девятьсот одиннадцать тысяч четыреста сорок три рубля тридцать одна копейка
```

*Использование фасада*

```php
use rikosage\NumberWordify\WordifyFacade;

echo WordifyFacade::toDocumentInRoubles(12110.54);
//двенадцать тысяч сто десять рублей 54 коп.

```
