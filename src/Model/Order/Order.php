<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\IdentifiableTrait;
use LMammino\EFoundation\Model\Owner\OwnerAwareTrait;
use LMammino\EFoundation\Model\SoftDeletableTrait;
use LMammino\EFoundation\Model\TimestampableTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Order
 *
 * @package LMammino\EFoundation\Model\Order
 */
class Order implements OrderInterface
{
    use IdentifiableTrait;
    use OwnerAwareTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }
    use SoftDeletableTrait;
    use AdjustableTrait {
        AdjustableTrait::__construct as private __adjustableConstruct;
    }

    /**
     * @var string $state
     */
    protected $state;

    /**
     * @var \DateTime $completedAt
     */
    protected $completedAt;

    /**
     * @var Collection $items
     */
    protected $items;

    /**
     * @var integer $itemsTotal
     */
    protected $itemsTotal;

    /**
     * @var integer $total
     */
    protected $total;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->__timestampableConstruct();
        $this->__adjustableConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isCompleted()
    {
        return null !== $this->completedAt;
    }

    /**
     * {@inheritDoc}
     */
    public function complete()
    {
        $this->setCompletedAt(new \DateTime());

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setCompletedAt(\DateTime $completedAt)
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     */
    public function setItems(Collection $items)
    {
        $this->itemsTotal = null;
        $this->total = null;

        $this->items = $items;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function countItems()
    {
        return $this->items->count();
    }

    /**
     * {@inheritDoc}
     */
    public function addItem(OrderItemInterface $item)
    {
        if ($this->hasItem($item)) {
            return $this;
        }

        foreach ($this->items as $existingItem) {
            if ($item->equals($existingItem)) {
                $existingItem->merge($item, false);

                $this->itemsTotal = null;
                $this->total = null;

                return $this;
            }
        }

        $item->setOrder($this);
        $this->items->add($item);

        $this->itemsTotal = null;
        $this->total = null;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeItem(OrderItemInterface $item)
    {
        if ($this->hasItem($item)) {
            $item->setOrder(null);
            $this->items->removeElement($item);

            $this->itemsTotal = null;
            $this->total = null;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasItem(OrderItemInterface $item)
    {
        return $this->items->contains($item);
    }

    /**
     * {@inheritDoc}
     */
    public function clearItems()
    {
        $this->items->clear();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty()
    {
        return $this->items->isEmpty();
    }

    /**
     * {@inheritDoc}
     */
    public function getItemsTotal()
    {
        if (null === $this->itemsTotal) {
            $this->calculateItemsTotal();
        }

        return $this->itemsTotal;
    }

    /**
     * {@inheritDoc}
     */
    public function calculateItemsTotal()
    {
        $itemsTotal = 0;

        foreach ($this->items as $item) {
            $itemsTotal += $item->getTotal();
        }

        $this->itemsTotal = $itemsTotal;

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
        $this->total = $this->getItemsTotal() + $this->getAdjustmentTotal();

        if ($this->total < 0) {
            $this->total = 0;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    protected function onAdjustmentsChange()
    {
        $this->total = null;
    }
}
