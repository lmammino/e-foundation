<?php

namespace LMammino\EFoundation\Price\Model;

use Doctrine\Common\Collections\Collection;
use LMammino\EFoundation\Order\Model\AdjustableInterface;

/**
 * Interface PricedItemsContainerInterface
 *
 * @package LMammino\EFoundation\Price\Model
 */
interface PricedItemsContainerInterface extends AdjustableInterface
{
    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency();

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency);

    /**
     * Get items
     *
     * @return Collection|PricedItemInterface[]
     */
    public function getItems();

    /**
     * Set items
     *
     * @param Collection $items
     *
     * @return $this
     */
    public function setItems(Collection $items);

    /**
     * Count items
     *
     * @return int
     */
    public function countItems();

    /**
     * Add an item
     *
     * @param PricedItemInterface $item
     *
     * @return $this
     */
    public function addItem(PricedItemInterface $item);

    /**
     * Remove a given item
     *
     * @param PricedItemInterface $item
     *
     * @return $this
     */
    public function removeItem(PricedItemInterface $item);

    /**
     * Check if has a given item
     *
     * @param PricedItemInterface $item
     *
     * @return boolean
     */
    public function hasItem(PricedItemInterface $item);

    /**
     * Gets the total price for all the items
     *
     * @return integer
     */
    public function getItemsTotal();

    /**
     * Calculate the total price for all the items
     *
     * @return $this
     */
    public function calculateItemsTotal();

    /**
     * Get the total price for the whole container
     * (includes container specific adjustments such as taxes, shipping and so on)
     *
     * @return integer
     */
    public function getTotal();

    /**
     * Set the total amount for the whole container
     *
     * @param integer $total
     *
     * @return $this
     */
    public function setTotal($total);

    /**
     * Calculate the total amount for the whole container
     *
     * @return $this
     */
    public function calculateTotal();

    /**
     * Check if the container has no item
     *
     * @return boolean
     */
    public function isEmpty();

    /**
     * Removes all the items from the container
     *
     * @return $this
     */
    public function clearItems();
}
