<?php
declare(strict_types=1);

use Banking\Factory;

// Прототип работы с модулем
// Вместо фейковых фабрик надо реализовать реальные

// Создаем липовые покупки.
$itemsCount = 10;
$items      = [];
while ($itemsCount--) {
    $items [] = Factory::createFakeOrderItem();
}

$card = Factory::createFakeCard();
// Отправка уведомления осуществляется из фабрики заказа.
$card->addOrder(Factory::createOrder($items, 0.98));

// Продолжаем работу с картой ....
