<?php
declare(strict_types=1);

namespace Banking;

class ValueAddedTax implements TaxInterface
{
    private const TAX_PERCENTS = 18;

    /**
     * @param float $value
     *
     * @return float
     */
    public static function getTaxByValue(float $value): float
    {
        return $value * self::TAX_PERCENTS / 100;
    }
}
