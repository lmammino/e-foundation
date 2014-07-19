<?php

namespace LMammino\EFoundation\Model\Order;

/**
 * Trait OrderAwareTrait
 *
 * @package LMammino\EFoundation\Model\Order
 */
trait OrderAwareTrait
{
    /**
     * @var OrderInterface $order
     */
    protected $order;

    /**
     * Get order
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set order
     *
     * @param OrderInterface|null $order
     *
     * @return $this
     */
    public function setOrder(OrderInterface $order = null)
    {
        $this->order = $order;

        return $this;
    }
}
