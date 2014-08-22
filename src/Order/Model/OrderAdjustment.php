<?php

namespace LMammino\EFoundation\Order\Model;

/**
 * Class OrderAdjustment
 *
 * @package LMammino\EFoundation\Order\Model
 */
class OrderAdjustment extends Adjustment implements OrderAdjustmentInterface
{
    /**
     * @var OrderInterface $order
     */
    protected $order;

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return $this->adjustable;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder(OrderInterface $order = null)
    {
        $this->adjustable = $this->order = $order;

        return $this;
    }
}
