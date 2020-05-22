<?php

declare(strict_types=1);

namespace Banking;

use Transport\SimpleMailer;

class Factory
{
    public static function createFakeCard(): ?CardInterface
    {
        return null;
    }

    public static function createOrder(array $items, float $discount = 1.0): ?OrderInterface
    {
        $order = (new Order())
            ->setId(sha1(microtime()))
            ->setDiscount($discount);

        foreach ($items as $item) {
            $order->addItem($item);
        }

        // Отправляем уведомление менеджерам.
        (new SimpleMailer())
            ->sendToManagers(
                sprintf(
                    '<p><b>%s</b> %.2f.</p>',
                    $order->getId(),
                    $order->getCost()
                )
            );

        return $order;
    }

    public static function createFakeOrderItem(): ?OrderItemInterface
    {
        return null;
    }
}
