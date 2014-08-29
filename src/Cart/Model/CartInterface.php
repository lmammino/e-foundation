<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\SoftDeletableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;
use LMammino\EFoundation\Owner\Model\OwnerAwareInterface;
use LMammino\EFoundation\Price\Model\PricedItemsContainerInterface;

/**
 * Interface CartInterface
 *
 * @package LMammino\EFoundation\Cart\Model
 */
interface CartInterface extends
    OwnerAwareInterface,
    PricedItemsContainerInterface,
    IdentifiableInterface,
    TimestampableInterface,
    SoftDeletableInterface
{
    /**
     * State constants
     */
    const STATE_CART        = 'cart';
    const STATE_CART_LOCKED = 'cart_locked';

    /**
     * Check if the order is completed
     *
     * @return boolean
     */
    public function isCompleted();

    /**
     * Mark the order as complete
     *
     * @return $this
     */
    public function complete();

    /**
     * Get the completion date
     *
     * @return \DateTime
     */
    public function getCompletedAt();

    /**
     * Set completed at date
     *
     * @param \DateTime $completedAt
     *
     * @return $this
     */
    public function setCompletedAt(\DateTime $completedAt);

    /**
     * Get the order state
     *
     * @return string
     */
    public function getState();

    /**
     * Set state
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state);

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
