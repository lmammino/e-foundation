<?php

namespace LMammino\EFoundation\Model\Order;

use Money\Money;

/**
 * Interface OrderItemInterface
 *
 * @package LMammino\EFoundation\Model\Order
 */
interface OrderItemInterface extends AdjustableInterface, OrderAwareInterface
{
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
     * @return Money
     */
    public function getUnitPrice();

    /**
     * Set unit price
     *
     * @param Money $unitPrice
     *
     * @return $this
     */
    public function setUnitPrice(Money $unitPrice);

    /**
     * get the total for the item
     *
     * @return Money
     */
    public function getTotal();

    /**
     * Set the total for the item
     *
     * @param Money $total
     *
     * @return $this
     */
    public function setTotal(Money $total);

    /**
     * Calculates the total for the item
     *
     * @return $this
     */
    public function calculateTotal();

    /**
     * Checks if the current order item is equal to a given order item
     *
     * @param OrderItemInterface $orderItem
     *
     * @return boolean
     */
    public function equals(OrderItemInterface $orderItem);

    /**
     * Merges two order items and returns the resulting one
     *
     * @param OrderItemInterface $orderItem
     *
     * @return OrderItemInterface
     */
    public function merge(OrderItemInterface $orderItem);

} 