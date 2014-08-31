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
    protected $state;


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
