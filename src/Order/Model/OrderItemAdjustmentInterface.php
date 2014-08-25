<?php

namespace LMammino\EFoundation\Order\Model;

/**
 * Interface OrderItemAdjustmentInterface
 *
 * @package LMammino\EFoundation\Order\Model
 */
interface OrderItemAdjustmentInterface
{
    /**
     * Get orderItem
     *
     * @return OrderItemInterface
     */
    public function getOrderItem();

    /**
     * Set orderItem
     *
     * @param OrderItemInterface $orderItem
     *
     * @return $this
     */
    public function setOrderItem(OrderItemInterface $orderItem = null);
}
