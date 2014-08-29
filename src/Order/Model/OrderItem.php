<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Price\Model\PricedItemTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;

/**
 * Class OrderItem
 *
 * @package LMammino\EFoundation\Order\Model
 */
class OrderItem implements OrderItemInterface
{
    use IdentifiableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }
    use OrderAwareTrait;
    use PricedItemTrait {
        PricedItemTrait::__construct as private __pricedItemConstruct;
        PricedItemTrait::onPrePersist as private __pricedItemOnPrePersist;
        PricedItemTrait::onPreUpdate as private __pricedItemOnPreUpdate;
    }

    /**
     * @var OrderItemSubjectInterface $subject
     */
    protected $subject;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__timestampableConstruct();
        $this->__pricedItemConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject(OrderItemSubjectInterface $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function equals(OrderItemInterface $orderItem)
    {
        return $this === $orderItem;
    }

    /**
     * {@inheritDoc}
     */
    public function merge(OrderItemInterface $orderItem)
    {
        if ($this !== $orderItem) {
            $this->quantity += $orderItem->getQuantity();
        }

        return $this;
    }

    /**
     * On pre persist
     */
    public function onPrePersist()
    {
        $this->__timestampableOnPrePersist();
        $this->__pricedItemOnPrePersist();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->__timestampableOnPreUpdate();
        $this->__pricedItemOnPreUpdate();
    }
}
