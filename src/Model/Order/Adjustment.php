<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\TimestampableTrait;

/**
 * Class Adjustment
 *
 * @package LMammino\EFoundation\Model\Order
 */
class Adjustment implements AdjustmentInterface
{
    use TimestampableTrait;

    /**
     * @var AdjustableInterface $adjustable
     */
    protected $adjustable;

    /**
     * @var string $label
     */
    protected $label;

    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var float $amount
     */
    protected $amount = 0;

    /**
     * @var bool $neutral
     */
    protected $neutral = false;

    /**
     * {@inheritDoc}
     */
    public function getAdjustable()
    {
        return $this->adjustable;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdjustable(AdjustableInterface $adjustable)
    {
        $this->adjustable = $adjustable;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * {@inheritDoc}
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * {@inheritDoc}
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isNeutral()
    {
        return $this->neutral;
    }

    /**
     * {@inheritDoc}
     */
    public function setNeutral($neutral)
    {
        $this->neutral = (Boolean) $neutral;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isCharge()
    {
        return ($this->amount > 0);
    }

    /**
     * {@inheritDoc}
     */
    public function isCredit()
    {
        return ($this->amount < 0);
    }
}