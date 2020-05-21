<?php
declare(strict_types=1);

namespace Banking;

interface CardInterface
{
    public function addOrder(OrderInterface $order): self;
}
