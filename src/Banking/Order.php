<?php
declare(strict_types=1);

namespace Banking;

class Order implements OrderInterface
{
    protected string $id;

    /**
     * @var \Banking\OrderItemInterface[]
     */
    protected array $items;

    protected float $discount;

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setId(string $value): self
    {
        $this->id = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @inheritDoc
     */
    public function setDiscount(float $value): self
    {
        $this->discount = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addItem(OrderItemInterface $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        $result = 0;
        foreach ($this->getItems() as $item) {
            $result += $item->getPrice();
        }

        return $result;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        $price = $this->getPrice() * $this->discount;
        $taxes = (new ValueAddedTax())->getTaxByValue($price);

        return $price + $taxes;
    }

}
