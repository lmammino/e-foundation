<?php

namespace LMammino\EFoundation\Model\Cart;

use LMammino\EFoundation\Model\Order\OrderInterface;

/**
 * Interface CartInterface
 *
 * @package LMammino\EFoundation\Model\Cart
 */
interface CartInterface extends OrderInterface
{
    /**
     * Gets expiration time.
     *
     * @return \DateTime
     */
    public function getExpiresAt();

    /**
     * Sets expiration time.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return $this
     */
    public function setExpiresAt(\DateTime $expiresAt = null);

    /**
     * Bumps the expiration time.
     * Default is +3 hours.
     *
     * @param \DateInterval|null $interval
     *
     * @return $this
     */
    public function incrementExpiresAt(\DateInterval $interval = null);

    /**
     * Checks whether the cart is expired or not.
     *
     * @return Boolean
     */
    public function isExpired();
}
