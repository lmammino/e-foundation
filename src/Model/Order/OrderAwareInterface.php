<?php

namespace LMammino\EFoundation\Model\Order;

/**
 * Interface OrderAwareInterface
 *
 * @package LMammino\EFoundation\Model\Order
 */
interface OrderAwareInterface
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
     * @param OrderInterface|null $order
     *
     * @return $this
     */
    public function setOrder(OrderInterface $order = null);

}
