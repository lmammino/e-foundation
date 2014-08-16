<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Owner\Model\OwnerAwareInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;
use LMammino\EFoundation\Common\Model\SoftDeletableInterface;

use Doctrine\Common\Collections\Collection;

/**
 * Interface OrderInterface
 *
 * @package LMammino\EFoundation\Order\Model
 */
interface OrderInterface extends
    OwnerAwareInterface,
    AdjustableInterface,
    IdentifiableInterface,
    TimestampableInterface,
    SoftDeletableInterface
{
    /**
     * State constants
     */
    const STATE_CART        = 'cart';
    const STATE_CART_LOCKED = 'cart_locked';
    const STATE_PENDING     = 'pending';
    const STATE_CONFIRMED   = 'confirmed';
    const STATE_SHIPPED     = 'shipped';
    const STATE_ABANDONED   = 'abandoned';
    const STATE_CANCELLED   = 'cancelled';
    const STATE_RETURNED    = 'returned';

    /**
     * Get the currency
     *
     * @return string
     */
    public function getCurrency();

    /**
     * Set the currency
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency);

    /**
     * Check ig the order is completed
     *
     * @return boolean
     */
    public function isCompleted();

    /**
     * Mark the order as complete
     *
     * @return $this
     */
    public function complete();

    /**
     * Get the completion date
     *
     * @return \DateTime
     */
    public function getCompletedAt();

    /**
     * Set completed at date
     *
     * @param \DateTime $completedAt
     *
     * @return $this
     */
    public function setCompletedAt(\DateTime $completedAt);

    /**
     * Get items
     *
     * @return Collection|OrderItemInterface[]
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
     * Add order item
     *
     * @param OrderItemInterface $item
     *
     * @return $this
     */
    public function addItem(OrderItemInterface $item);

    /**
     * Remove a given order item
     *
     * @param OrderItemInterface $item
     *
     * @return $this
     */
    public function removeItem(OrderItemInterface $item);

    /**
     * Check if has a given order item
     *
     * @param OrderItemInterface $item
     *
     * @return boolean
     */
    public function hasItem(OrderItemInterface $item);

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
     * Get the total price for the whole order (includes order specific adjustments such as taxes, shipping and so on)
     *
     * @return integer
     */
    public function getTotal();

    /**
     * Set the total amount for the whole order
     *
     * @param integer $total
     *
     * @return $this
     */
    public function setTotal($total);

    /**
     * Calculate the total amount for the whole order
     *
     * @return $this
     */
    public function calculateTotal();

    /**
     * Check if the order has no item
     *
     * @return boolean
     */
    public function isEmpty();

    /**
     * Removes all the items from the order
     *
     * @return $this
     */
    public function clearItems();

    /**
     * Get the order state
     *
     * @return string
     */
    public function getState();

    /**
     * Set state
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state);
}
