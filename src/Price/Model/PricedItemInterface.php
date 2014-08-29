<?php

namespace LMammino\EFoundation\Price\Model;

use LMammino\EFoundation\Price\Model\AdjustableInterface;

/**
 * Interface PricedItemInterface
 *
 * @package LMammino\EFoundation\Price\Model
 */
interface PricedItemInterface extends AdjustableInterface
{
    /**
     * Get the container
     *
     * @return PricedItemsContainerInterface
     */
    public function getContainer();

    /**
     * Set the container
     *
     * @param PricedItemsContainerInterface $container
     *
     * @return $this
     */
    public function setContainer(PricedItemsContainerInterface $container = null);

    /**
     * Get quantity
     *
     * @return float
     */
    public function getQuantity();

    /**
     * Set quantity
     *
     * @param float $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity);

    /**
     * Get unit price
     *
     * @return integer
     */
    public function getUnitPrice();

    /**
     * Set unit price
     *
     * @param integer $unitPrice
     *
     * @return $this
     */
    public function setUnitPrice($unitPrice);

    /**
     * get the total for the item
     *
     * @return integer
     */
    public function getTotal();

    /**
     * Set the total for the item
     *
     * @param integer $total
     *
     * @return $this
     */
    public function setTotal($total);

    /**
     * Calculates the total for the item
     *
     * @return $this
     */
    public function calculateTotal();

    /**
     * Check if the current item is equal to a given one
     *
     * @param PricedItemInterface $item
     *
     * @return boolean
     */
    public function equals(PricedItemInterface $item);

    /**
     * Merges the current item with another one
     *
     * @param PricedItemInterface $item
     *
     * @return $this
     */
    public function merge(PricedItemInterface $item);
}
