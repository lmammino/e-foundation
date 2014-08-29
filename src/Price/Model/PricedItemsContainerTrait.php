<?php

namespace LMammino\EFoundation\Price\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use LMammino\EFoundation\Price\Model\AdjustableTrait;

/**
 * Class PricedItemsContainerTrait
 *
 * @package LMammino\EFoundation\Price\Model
 */
trait PricedItemsContainerTrait
{
    use AdjustableTrait {
        AdjustableTrait::__construct as private __adjustableConstruct;
        AdjustableTrait::onPrePersist as private __adjustableOnPrePersist;
        AdjustableTrait::onPreUpdate as private __adjustableOnPreUpdate;
    }

    /**
     * @var string $currency
     */
    protected $currency;

    /**
     * @var Collection $items
     */
    protected $items;

    /**
     * @var integer $itemsTotal
     */
    protected $itemsTotal = 0;

    /**
     * @var integer $total
     */
    protected $total = 0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->__adjustableConstruct();
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
     * Get items
     *
     * @return Collection|PricedItemInterface[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set items
     *
     * @param Collection $items
     *
     * @return $this
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
     * Count items
     *
     * @return int
     */
    public function countItems()
    {
        return $this->items->count();
    }

    /**
     * Add an item
     *
     * @param PricedItemInterface $item
     *
     * @return $this
     */
    public function addItem(PricedItemInterface $item)
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

        $item->setContainer($this);
        $this->items->add($item);

        $this->itemsTotal = null;
        $this->total = null;

        return $this;
    }

    /**
     * Remove a given item
     *
     * @param PricedItemInterface $item
     *
     * @return $this
     */
    public function removeItem(PricedItemInterface $item)
    {
        if ($this->hasItem($item)) {
            $item->setContainer(null);
            $this->items->removeElement($item);

            $this->itemsTotal = null;
            $this->total = null;
        }

        return $this;
    }

    /**
     * Check if has a given item
     *
     * @param PricedItemInterface $item
     *
     * @return boolean
     */
    public function hasItem(PricedItemInterface $item)
    {
        return $this->items->contains($item);
    }

    /**
     * Gets the total price for all the items
     *
     * @return integer
     */
    public function getItemsTotal()
    {
        $this->recalculateItemsTotalIfNeeded();

        return $this->itemsTotal;
    }

    /**
     * Calculate the total price for all the items
     *
     * @return $this
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
     * Get the total price for the whole container
     * (includes container specific adjustments such as taxes, shipping and so on)
     *
     * @return integer
     */
    public function getTotal()
    {
        $this->recalculateTotalIfNeeded();

        return $this->total;
    }

    /**
     * Set the total amount for the whole container
     *
     * @param integer $total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Calculate the total amount for the whole container
     *
     * @return $this
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
     * Check if the container has no item
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->items->isEmpty();
    }

    /**
     * Removes all the items from the container
     *
     * @return $this
     */
    public function clearItems()
    {
        $this->items->clear();

        return $this;
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

    /**
     * On pre persist
     */
    public function onPrePersist()
    {
        $this->__adjustableOnPrePersist();
        $this->recalculateItemsTotalIfNeeded();
        $this->recalculateTotalIfNeeded();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->__adjustableOnPreUpdate();
        $this->recalculateItemsTotalIfNeeded();
        $this->recalculateTotalIfNeeded();
    }
}
