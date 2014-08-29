<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Price\Model\AdjustableInterface;
use LMammino\EFoundation\Price\Model\Adjustment;

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
        return $this->orderItem;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderItem(OrderItemInterface $orderItem = null)
    {
        return $this->setAdjustable($orderItem);
    }

    /**
     * {@inheritDoc}
     */
    public function setAdjustable(AdjustableInterface $adjustable = null)
    {
        $this->adjustable = $this->orderItem = $adjustable;

        return $this;
    }
}
