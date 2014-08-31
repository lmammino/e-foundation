<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;
use LMammino\EFoundation\Price\Model\PricedItemInterface;

/**
 * Interface OrderItemInterface
 *
 * @package LMammino\EFoundation\Order\Model
 */
interface OrderItemInterface extends
    IdentifiableInterface,
    OrderAwareInterface,
    PricedItemInterface,
    TimestampableInterface
{
    /**
     * Get variant
     *
     * @return OrderItemSubjectInterface
     */
    public function getSubject();

    /**
     * Set variant
     *
     * @param OrderItemSubjectInterface $subject
     *
     * @return $this
     */
    public function setSubject(OrderItemSubjectInterface $subject = null);
}
