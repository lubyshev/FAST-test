<?php
declare(strict_types=1);

namespace Banking;

interface TaxInterface
{
    public static function getTaxByValue(float $value): float;
}
