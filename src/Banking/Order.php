<?php
declare(strict_types=1);

namespace Banking;

use Transport\SimpleMailer;

class Order implements OrderInterface
{

    // По уму надо взять из ENV
    private const MAILER_LOGIN    = 'cartuser';
    private const MAILER_PASSWORD = 'j049lj-01';

    protected string $id;

    /**
     * @var \Banking\OrderItemInterface[]
     */
    protected array $items;

    protected float $discount;

    /**
     * Order constructor.
     *
     * @param float $discount
     *
     * @todo Сделать интерфейс для списка покупок OrderItemsListInterface.
     */
    public function __construct(float $discount = 1.0)
    {
        $this->discount = $discount;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setId(string $id): self
    {
        $this->id = $id;

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
     * @inheritDoc
     */
    public function notify(): self
    {
        (new SimpleMailer(self::MAILER_LOGIN, self::MAILER_PASSWORD))
            ->sendToManagers(
                sprintf(
                    '<p><b>%s</b> %.2f.</p>',
                    $this->getId(),
                    $this->getCost()
                )
            );

        return $this;
    }

    /**
     * @return float
     */
    private function getPrice(): float
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
    private function getCost(): float
    {
        $price = $this->getPrice() * $this->discount;
        $taxes = (new ValueAddedTax())->getTaxByValue($price);

        return $price + $taxes;
    }

}
