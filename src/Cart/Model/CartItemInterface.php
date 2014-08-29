<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Order\Model\AdjustableInterface;
use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;
use LMammino\EFoundation\Price\Model\PricedItemInterface;

/**
 * Interface CartItemInterface
 *
 * @package LMammino\EFoundation\Cart\Model
 */
interface CartItemInterface extends
    IdentifiableInterface,
    CartAwareInterface,
    PricedItemInterface,
    TimestampableInterface
{
    /**
     * Get variant
     *
     * @return CartItemSubjectInterface
     */
    public function getSubject();

    /**
     * Set variant
     *
     * @param CartItemSubjectInterface $subject
     *
     * @return $this
     */
    public function setSubject(CartItemSubjectInterface $subject = null);
}
