<?php

namespace LMammino\EFoundation\Price\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;

/**
 * Interface AdjustmentInterface
 *
 * @package LMammino\EFoundation\Price\Model
 */
interface AdjustmentInterface extends IdentifiableInterface, TimestampableInterface
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
     * @param AdjustableInterface|null $adjustable
     *
     * @return $this
     */
    public function setAdjustable(AdjustableInterface $adjustable = null);

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
     * @return integer
     */
    public function getAmount();

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return $this
     */
    public function setAmount($amount);

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
