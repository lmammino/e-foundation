<?php


namespace LMammino\EFoundation\Model\Order;

/**
 * Class OrderAwareTrait
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
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder(OrderInterface $order)
    {
        $this->order = $order;

        return $this;
    }
} 