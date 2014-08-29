<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Price\Model\AdjustmentInterface;

/**
 * Interface OrderAdjustmentInterface
 *
 * @package LMammino\EFoundation\Order\Model
 */
interface OrderAdjustmentInterface extends AdjustmentInterface
{
    /**
     * Get order
     *
     * @return OrderInterface
     */
    public function getOrder();

    /**
     * Set order
     *
     * @param OrderInterface $order
     *
     * @return $this
     */
    public function setOrder(OrderInterface $order = null);
}
