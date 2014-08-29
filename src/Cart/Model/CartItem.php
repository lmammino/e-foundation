<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;
use LMammino\EFoundation\Price\Model\PricedItemTrait;

/**
 * Class CartItem
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class CartItem implements CartItemInterface
{
    use IdentifiableTrait;
    use CartAwareTrait;
    use PricedItemTrait {
        PricedItemTrait::__construct as private __pricedItemConstruct;
        PricedItemTrait::onPrePersist as private __pricedItemOnPrePersist;
        PricedItemTrait::onPreUpdate as private __pricedItemOnPreUpdate;
    }
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
        TimestampableTrait::onPrePersist as private __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as private __timestampableOnPreUpdate;
    }

    /**
     * @var CartItemSubjectInterface $subject
     */
    protected $subject;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__timestampableConstruct();
        $this->__pricedItemConstruct();
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
    public function setSubject(CartItemSubjectInterface $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * On pre persist
     */
    public function onPrePersist()
    {
        $this->__timestampableOnPrePersist();
        $this->__pricedItemOnPrePersist();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->__timestampableOnPreUpdate();
        $this->__pricedItemOnPreUpdate();
    }
}
