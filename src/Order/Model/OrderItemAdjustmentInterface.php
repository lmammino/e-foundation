<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Price\Model\AdjustmentInterface;

/**
 * Interface OrderItemAdjustmentInterface
 *
 * @package LMammino\EFoundation\Order\Model
 */
interface OrderItemAdjustmentInterface extends AdjustmentInterface
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
