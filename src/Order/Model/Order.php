<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Owner\Model\OwnerAwareTrait;
use LMammino\EFoundation\Common\Model\SoftDeletableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Order
 *
 * @package LMammino\EFoundation\Order\Model
 */
class Order implements OrderInterface
{
    use IdentifiableTrait;
    use OwnerAwareTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }
    use SoftDeletableTrait;
    use AdjustableTrait {
        AdjustableTrait::__construct as private __adjustableConstruct;
        TimestampableTrait::onPrePersist as private __adjustableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __adjustableOnPreUpdate;
    }

    /**
     * @var string $state
     */
    protected $state;

    /**
     * @var string $currency
     */
    protected $currency;

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
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

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

        foreach ($items as $item) {
            $this->addItem($item);
        }

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
        $this->recalculateItemsTotalIfNeeded();

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
        $this->total = $this->getItemsTotal() + $this->getAdjustmentTotal();

        if ($this->total < 0) {
            $this->total = 0;
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
        $this->recalculateItemsTotalIfNeeded();
        $this->recalculateTotalIfNeeded();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->__timestampableOnPreUpdate();
        $this->__adjustableOnPreUpdate();
        $this->recalculateItemsTotalIfNeeded();
        $this->recalculateTotalIfNeeded();
    }

    /**
     * {@inheritDoc}
     */
    protected function onAdjustmentsChange()
    {
        $this->total = null;
    }

    /**
     * Recalculates items total if needed
     */
    protected function recalculateItemsTotalIfNeeded()
    {
        if (null === $this->itemsTotal) {
            $this->calculateItemsTotal();
        }
    }

    /**
     * Recalculates total if needed
     */
    protected function recalculateTotalIfNeeded()
    {
        if (null === $this->total) {
            $this->calculateTotal();
        }
    }
}
