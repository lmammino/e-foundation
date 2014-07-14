<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\TimestampableTrait;

use Money\Money;

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
     * @var Money $amount
     */
    protected $amount;

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
    public function setAmount(Money $amount)
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
        if (null === $this->amount) {
            throw new \BadMethodCallException('No amount set');
        }

        return $this->amount->isPositive();
    }

    /**
     * {@inheritDoc}
     */
    public function isCredit()
    {
        if (null === $this->amount) {
            throw new \BadMethodCallException('No amount set');
        }

        return $this->amount->isNegative();
    }
}