<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;
use LMammino\EFoundation\Common\Model\SoftDeletableInterface;
use LMammino\EFoundation\Owner\Model\OwnerAwareInterface;
use LMammino\EFoundation\Price\Model\PricedItemsContainerInterface;

/**
 * Interface OrderInterface
 *
 * @package LMammino\EFoundation\Order\Model
 */
interface OrderInterface extends
    OwnerAwareInterface,
    PricedItemsContainerInterface,
    IdentifiableInterface,
    TimestampableInterface,
    SoftDeletableInterface
{
    /**
     * State constants
     */
    const STATE_NEW         = 'new';
    const STATE_PENDING     = 'pending';
    const STATE_CONFIRMED   = 'confirmed';
    const STATE_SHIPPING    = 'shipping';
    const STATE_SHIPPED     = 'shipped';
    const STATE_ABANDONED   = 'abandoned';
    const STATE_CANCELLED   = 'cancelled';
    const STATE_RETURNED    = 'returned';
    const STATE_COMPLETED   = 'completed';

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
}
