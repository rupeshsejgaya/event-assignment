<?php

namespace App\Helpers;

class ConstantHelper
{
    const EVERY = 'every';
    const EVERY_OTHER = 'every_other';
    const EVERY_THIRD = 'every_third';
    const EVERY_FOURTH = 'every_fourth';
    const RECURRANCE1 = [
        self::EVERY,
        self::EVERY_OTHER,
        self::EVERY_THIRD,
        self::EVERY_FOURTH,
    ];

    const DAY = 'day';
    const WEEK = 'week';
    const MONTH = 'month';
    const YEAR = 'year';

    const RECURRANCE2 = [
        self::DAY,
        self::WEEK,
        self::MONTH,
        self::YEAR,
    ];
}
