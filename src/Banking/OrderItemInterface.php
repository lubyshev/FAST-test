<?php
declare(strict_types=1);

namespace Banking;

interface OrderItemInterface
{
    /**
     * @return float
     */
    public function getPrice(): float;
}
