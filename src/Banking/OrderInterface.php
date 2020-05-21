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
     * @return $this
     */
    public function notify(): self;

}
