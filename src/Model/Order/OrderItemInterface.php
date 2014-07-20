<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\IdentifiableInterface;
use LMammino\EFoundation\Model\TimestampableInterface;

/**
 * Interface OrderItemInterface
 *
 * @package LMammino\EFoundation\Model\Order
 */
interface OrderItemInterface extends
    AdjustableInterface,
    IdentifiableInterface,
    OrderAwareInterface,
    TimestampableInterface
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
     * Checks if the current order item is equal to a given order item
     *
     * @param OrderItemInterface $orderItem
     *
     * @return boolean
     */
    public function equals(OrderItemInterface $orderItem);

    /**
     * Merges two order items. The current order item will result with an increased quantity
     *
     * @param OrderItemInterface $orderItem
     *
     * @return $this
     */
    public function merge(OrderItemInterface $orderItem);
}
