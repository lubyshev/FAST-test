<?php
declare(strict_types=1);

namespace Banking;

interface OrderInterface
{

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id): self;

    /**
     * @return float
     */
    public function getDiscount(): float;

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setDiscount(float $value): self;

    /**
     * @param \Banking\OrderItemInterface $item
     *
     * @return $this
     */
    public function addItem(OrderItemInterface $item): self;

    /**
     * @return OrderItemInterface[]
     */
    public function getItems(): array;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * Возвращает стоимость с учетом налогов и скидок.
     *
     * @return float
     */
    public function getCost(): float;

}
