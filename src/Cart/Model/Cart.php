<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\SoftDeletableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;
use LMammino\EFoundation\Owner\Model\OwnerAwareTrait;
use LMammino\EFoundation\Price\Model\PricedItemsContainer;

/**
 * Class Cart
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class Cart extends PricedItemsContainer implements CartInterface
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
    protected $state;

    /**
     * @var \DateTime $expiresAt
     */
    protected $expiresAt;

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
     * {@inheritDoc}
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setExpiresAt(\DateTime $expiresAt = null)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function incrementExpiresAt(\DateInterval $interval = null)
    {
        if (null === $this->expiresAt) {
            $this->expiresAt = new \DateTime();
        }

        if (null === $interval) {
            $interval = new \DateInterval('PT3H');
        }

        $this->expiresAt->add($interval);

        return $this;
    }

    /**
     * Checks whether the cart is expired or not.
     *
     * @return Boolean
     */
    public function isExpired()
    {
        if (null === $this->expiresAt) {
            return false;
        }

        $now = new \DateTime();

        return $this->expiresAt < $now;
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
