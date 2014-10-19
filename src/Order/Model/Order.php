<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Owner\Model\OwnerAwareTrait;
use LMammino\EFoundation\Common\Model\SoftDeletableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;

use LMammino\EFoundation\Price\Model\PricedItemsContainer;

/**
 * Class Order
 *
 * @package LMammino\EFoundation\Order\Model
 */
class Order extends PricedItemsContainer implements OrderInterface
{
    use IdentifiableTrait;
    use OwnerAwareTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }
    use SoftDeletableTrait;

    /**
     * @var string $state
     */
    protected $state = self::STATE_NEW;


    /**
     * @var \DateTime $completedAt
     */
    protected $completedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->__timestampableConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isCompleted()
    {
        return null !== $this->completedAt;
    }

    /**
     * {@inheritDoc}
     */
    public function complete()
    {
        $this->setCompletedAt(new \DateTime());
        $this->setState(self::STATE_COMPLETED);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setCompletedAt(\DateTime $completedAt)
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    /**
     * Check if new
     *
     * @return bool
     */
    public function isNew()
    {
        return ($this->state === self::STATE_NEW);
    }

    /**
     * Check if pending
     *
     * @return bool
     */
    public function isPending()
    {
        return ($this->state === self::STATE_PENDING);
    }

    /**
     * Check if confirmed
     *
     * @return bool
     */
    public function isConfirmed()
    {
        return ($this->state === self::STATE_CONFIRMED);
    }

    /**
     * Check if in shipping
     *
     * @return bool
     */
    public function isShipping()
    {
        return ($this->state === self::STATE_SHIPPING);
    }

    /**
     * Check if shipped
     *
     * @return bool
     */
    public function isShipped()
    {
        return ($this->state === self::STATE_COMPLETED);
    }

    /**
     * Check if abandoned
     *
     * @return bool
     */
    public function isAbandoned()
    {
        return ($this->state === self::STATE_ABANDONED);
    }

    /**
     * Check if cancelled
     *
     * @return bool
     */
    public function isCancelled()
    {
        return ($this->state === self::STATE_CANCELLED);
    }

    /**
     * Check if returned
     *
     * @return bool
     */
    public function isReturned()
    {
        return ($this->state === self::STATE_RETURNED);
    }

    /**
     * On pre persist
     */
    public function onPrePersist()
    {
        parent::onPrePersist();
        $this->__timestampableOnPrePersist();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        parent::onPreUpdate();
        $this->__timestampableOnPreUpdate();
    }
}
