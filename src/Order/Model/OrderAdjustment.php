<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Price\Model\AdjustableInterface;
use LMammino\EFoundation\Price\Model\Adjustment;

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
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder(OrderInterface $order = null)
    {
        return $this->setAdjustable($order);
    }

    /**
     * {@inheritDoc}
     */
    public function setAdjustable(AdjustableInterface $adjustable = null)
    {
        $this->adjustable = $this->order = $adjustable;

        return $this;
    }
}
