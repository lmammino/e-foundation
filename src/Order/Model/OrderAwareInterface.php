<?php

namespace LMammino\EFoundation\Order\Model;

/**
 * Interface OrderAwareInterface
 *
 * @package LMammino\EFoundation\Order\Model
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
