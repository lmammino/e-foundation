<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\TimestampableTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class OrderItem
 *
 * @package LMammino\EFoundation\Model\Order
 */
class OrderItem implements OrderItemInterface
{
    use OrderAwareTrait;
    use TimestampableTrait;

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
     * @var Collection $adjustments
     */
    protected $adjustments;

    /**
     * @var integer $adjustmentsTotal
     */
    protected $adjustmentsTotal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adjustments = new ArrayCollection();
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
    public function getAdjustments()
    {
        return $this->adjustments;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdjustments(Collection $adjustments)
    {
        $this->adjustmentsTotal = null;
        $this->adjustments = $adjustments;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addAdjustment(AdjustmentInterface $adjustment)
    {
        if (!$this->hasAdjustment($adjustment)) {
            $this->adjustmentsTotal = null;
            $adjustment->setAdjustable($this);
            $this->adjustments->add($adjustment);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasAdjustment(AdjustmentInterface $adjustment)
    {
        return $this->adjustments->contains($adjustment);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAdjustment(AdjustmentInterface $adjustment)
    {
        if ($this->hasAdjustment($adjustment)) {
            $this->adjustmentsTotal = null;
            $adjustment->setAdjustable(null);
            $this->adjustments->removeElement($adjustment);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearAdjustments()
    {
        $this->adjustmentsTotal = null;
        $this->adjustments->clear();
    }

    /**
     * {@inheritDoc}
     */
    public function getAdjustmentTotal()
    {
        if (null === $this->adjustmentsTotal) {
            $this->calculateAdjustmentsTotal();
        }

        return $this->adjustmentsTotal;
    }

    /**
     * {@inheritDoc}
     */
    public function calculateAdjustmentsTotal()
    {
        $this->adjustmentsTotal = 0;

        foreach ($this->adjustments as $adjustment) {
            if (!$adjustment->isNeutral()) {
                $this->adjustmentsTotal += $adjustment->getAmount();
            }
        }

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
}