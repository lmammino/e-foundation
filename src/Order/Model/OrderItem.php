<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;

/**
 * Class OrderItem
 *
 * @package LMammino\EFoundation\Order\Model
 */
class OrderItem implements OrderItemInterface
{
    use IdentifiableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }
    use OrderAwareTrait;
    use AdjustableTrait {
        AdjustableTrait::__construct as private __adjustableConstruct;
        TimestampableTrait::onPrePersist as private __adjustableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __adjustableOnPreUpdate;
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
        $this->recalculateTotalIfNeeded();

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
     * On pre persist
     */
    public function onPrePersist()
    {
        $this->__timestampableOnPrePersist();
        $this->__adjustableOnPrePersist();
        $this->recalculateTotalIfNeeded();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->__timestampableOnPreUpdate();
        $this->__adjustableOnPreUpdate();
        $this->recalculateTotalIfNeeded();
    }

    /**
     * Recalculates the total if needed
     */
    protected function recalculateTotalIfNeeded()
    {
        if (null === $this->total) {
            $this->calculateTotal();
        }
    }

    /**
     * {@inheritDoc}
     */
    protected function onAdjustmentsChange()
    {
        $this->total = null;
    }
}
