<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;
use LMammino\EFoundation\Price\Model\PricedItem;

/**
 * Class CartItem
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class CartItem extends PricedItem implements CartItemInterface
{
    use IdentifiableTrait;
    use CartAwareTrait;
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
