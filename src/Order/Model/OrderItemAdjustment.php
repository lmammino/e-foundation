<?php

namespace LMammino\EFoundation\Order\Model;

/**
 * Class OrderItemAdjustment
 *
 * @package LMammino\EFoundation\Order\Model
 */
class OrderItemAdjustment extends Adjustment implements OrderItemAdjustmentInterface
{
    /**
     * @var OrderItemInterface $orderItem
     */
    protected $orderItem;

    /**
     * {@inheritDoc}
     */
    public function getOrderItem()
    {
        return $this->adjustable;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderItem(OrderItemInterface $orderItem = null)
    {
        $this->adjustable = $this->orderItem = $orderItem;

        return $this;
    }
}
