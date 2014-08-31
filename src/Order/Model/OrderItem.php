<?php

namespace LMammino\EFoundation\Order\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Price\Model\PricedItem;
use LMammino\EFoundation\Common\Model\TimestampableTrait;

/**
 * Class OrderItem
 *
 * @package LMammino\EFoundation\Order\Model
 */
class OrderItem extends PricedItem implements OrderItemInterface
{
    use IdentifiableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }
    use OrderAwareTrait;

    /**
     * @var OrderItemSubjectInterface $subject
     */
    protected $subject;

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
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject(OrderItemSubjectInterface $subject = null)
    {
        $this->subject = $subject;

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
