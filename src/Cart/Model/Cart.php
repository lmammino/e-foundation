<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\SoftDeletableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;
use LMammino\EFoundation\Owner\Model\OwnerAwareTrait;
use LMammino\EFoundation\Price\Model\PricedItemsContainerTrait;

/**
 * Class Cart
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class Cart implements CartInterface
{
    use IdentifiableTrait;
    use OwnerAwareTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }
    use SoftDeletableTrait;
    use PricedItemsContainerTrait {
        PricedItemsContainerTrait::__construct as private __pricedItemsContainerConstruct;
        PricedItemsContainerTrait::onPrePersist as private __pricedItemsContainerOnPrePersist;
        PricedItemsContainerTrait::onPreUpdate as private __pricedItemsContainerOnPreUpdate;
    }

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
        $this->__timestampableConstruct();
        $this->__pricedItemsContainerConstruct();
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
        $this->__timestampableOnPrePersist();
        $this->__pricedItemsContainerOnPrePersist();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->__timestampableOnPreUpdate();
        $this->__pricedItemsContainerOnPreUpdate();
    }
}
