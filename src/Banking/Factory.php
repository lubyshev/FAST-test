<?php

declare(strict_types=1);

namespace Banking;

class Factory
{
    public static function createFakeCard(): ?CardInterface
    {
        return null;
    }

    public static function createOrder(array $items, float $discount = 1.0): ?OrderInterface
    {
        /** @todo Более сильный Id */
        $order = (new Order($discount))->setId(sha1(microtime()));
        foreach ($items as $item) {
            $order->addItem($item);
        }
        $order->notify();

        return $order;
    }

    public static function createFakeOrderItem(): ?OrderItemInterface
    {
        return null;
    }
}
