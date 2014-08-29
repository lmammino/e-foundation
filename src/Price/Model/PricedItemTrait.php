<?php

namespace LMammino\EFoundation\Price\Model;

use LMammino\EFoundation\Price\Model\AdjustableTrait;

/**
 * Trait PricedItemTrait
 *
 * @package LMammino\EFoundation\Price\Model
 */
trait PricedItemTrait
{
    use AdjustableTrait {
        AdjustableTrait::__construct as private __adjustableConstruct;
        AdjustableTrait::onPrePersist as private __adjustableOnPrePersist;
        AdjustableTrait::onPreUpdate as private __adjustableOnPreUpdate;
    }

    /**
     * @var PricedItemsContainerInterface $container
     */
    protected $container;

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
        $this->__adjustableConstruct();
    }

    /**
     * Get the container
     *
     * @return PricedItemsContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set the container
     *
     * @param PricedItemsContainerInterface $container
     *
     * @return $this
     */
    public function setContainer(PricedItemsContainerInterface $container = null)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param float $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->total = null;
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get unit price
     *
     * @return integer
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set unit price
     *
     * @param integer $unitPrice
     *
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->total = null;
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * get the total for the item
     *
     * @return integer
     */
    public function getTotal()
    {
        $this->recalculateTotalIfNeeded();

        return $this->total;
    }

    /**
     * Set the total for the item
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
     * Calculates the total for the item
     *
     * @return $this
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
    public function equals(PricedItemInterface $item)
    {
        return $this === $item;
    }

    /**
     * {@inheritDoc}
     */
    public function merge(PricedItemInterface $item)
    {
        if ($this !== $item) {
            $this->quantity += $item->getQuantity();
        }

        return $this;
    }

    /**
     * On pre persist
     */
    public function onPrePersist()
    {
        $this->__adjustableOnPrePersist();
        $this->recalculateTotalIfNeeded();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
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
