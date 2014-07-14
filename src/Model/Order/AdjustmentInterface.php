<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\TimestampableInterface;

use Money\Money;

/**
 * Interface AdjustmentInterface
 *
 * @package LMammino\EFoundation\Model\Order
 */
interface AdjustmentInterface extends TimestampableInterface
{
    /**
     * Get the adjustable subject
     *
     * @return AdjustableInterface
     */
    public function getAdjustable();

    /**
     * Set the adjustable subject
     *
     * @param AdjustableInterface $adjustable
     *
     * @return $this
     */
    public function setAdjustable(AdjustableInterface $adjustable);

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel();

    /**
     * Set label
     *
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get amount
     *
     * @return Money
     */
    public function getAmount();

    /**
     * Set amount
     *
     * @param Money $amount
     *
     * @return $this
     */
    public function setAmount(Money $amount);

    /**
     * Check if it is neutral
     *
     * @return boolean
     */
    public function isNeutral();

    /**
     * Set neutral
     *
     * @param boolean $neutral
     *
     * @return $this
     */
    public function setNeutral($neutral);

    /**
     * Check if the adjustment is a charge (more money needed)
     *
     * @return boolean
     */
    public function isCharge();

    /**
     * Check if the adjustment is a credit (less money needed)
     *
     * @return boolean
     */
    public function isCredit();

} 