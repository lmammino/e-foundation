<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Order\Model\OrderInterface;

/**
 * Interface CartInterface
 *
 * @package LMammino\EFoundation\Cart\Model
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
