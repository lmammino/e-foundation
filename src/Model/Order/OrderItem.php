<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\IdentifiableTrait;
use LMammino\EFoundation\Model\TimestampableTrait;

/**
 * Class OrderItem
 *
 * @package LMammino\EFoundation\Model\Order
 */
class OrderItem implements OrderItemInterface
{
    use IdentifiableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }
    use OrderAwareTrait;
    use AdjustableTrait {
        AdjustableTrait::__construct as private __adjustableConstruct;
    }

    /**
     * @var float $quantity
     */
    protected $quantity = 1;

    /**
     * @var integer $unitPrice
     */
    protected $unitPrice;

    /**
     * @var integer $total
     */
    protected $total;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__timestampableConstruct();
        $this->__adjustableConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * {@inheritDoc}
     */
    public function setQuantity($quantity)
    {
        $this->total = null;
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * {@inheritDoc}
     */
    public function setUnitPrice($unitPrice)
    {
        $this->total = null;
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotal()
    {
        if (null === $this->total) {
            $this->calculateTotal();
        }

        return $this->total;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function calculateTotal()
    {
        $this->calculateAdjustmentsTotal();

        $this->total = ($this->quantity * $this->unitPrice) + $this->adjustmentsTotal;

        if ($this->total < 0) {
            $this->total = 0;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function equals(OrderItemInterface $orderItem)
    {
        return $this === $orderItem;
    }

    /**
     * {@inheritDoc}
     */
    public function merge(OrderItemInterface $orderItem)
    {
        if ($this !== $orderItem) {
            $this->quantity += $orderItem->getQuantity();
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    private function onAdjustmentsChange()
    {
        $this->total = null;
    }
}
