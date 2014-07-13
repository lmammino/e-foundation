<?php

namespace LMammino\EFoundation\Model\Order;

use LMammino\EFoundation\Model\TimestampableInterface;

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
     * @return AdjustmentInterface
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
     * @return AdjustmentInterface
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
     * @return AdjustmentInterface
     */
    public function setDescription($description);

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount();

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return AdjustmentInterface
     */
    public function setAumount($amount);

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
     * @return AdjustmentInterface
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