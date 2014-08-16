<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\IdentifiableTrait;
use LMammino\EFoundation\Model\TimestampableTrait;

/**
 * Class Adjustment
 *
 * @package LMammino\EFoundation\Model\Order
 */
class Adjustment implements AdjustmentInterface
{
    use IdentifiableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }

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
     * @var integer $amount
     */
    protected $amount;

    /**
     * @var boolean $neutral
     */
    protected $neutral = false;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__timestampableConstruct();
    }

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
    public function setAdjustable(AdjustableInterface $adjustable = null)
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
        $this->assertAmountIsSet();

        return $this->amount > 0;
    }

    /**
     * {@inheritDoc}
     */
    public function isCredit()
    {
        $this->assertAmountIsSet();

        return $this->amount < 0;
    }

    /**
     * Checks if the amount is set and throws an exception whether it's not
     *
     * @throws \BadMethodCallException
     */
    private function assertAmountIsSet()
    {
        if (null === $this->amount) {
            throw new \BadMethodCallException('No amount set');
        }
    }
}
