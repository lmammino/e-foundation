<?php

namespace LMammino\EFoundation\Model\Order;

use Doctrine\Common\Collections\Collection;

/**
 * Interface AdjustableInterface
 *
 * @package LMammino\EFoundation\Model\Order
 */
interface AdjustableInterface
{
    /**
     * Get adjustments
     *
     * @return Collection|AdjustmentInterface[]
     */
    public function getAdjustments();

    /**
     * Set adjustments
     *
     * @param Collection $adjustments
     *
     * @return $this
     */
    public function setAdjustments(Collection $adjustments);

    /**
     * Add adjustment
     *
     * @param AdjustmentInterface $adjustment
     *
     * @return $this
     */
    public function addAdjustment(AdjustmentInterface $adjustment);

    /**
     * Check if contains a given adjustment
     *
     * @param AdjustmentInterface $adjustment
     *
     * @return boolean
     */
    public function hasAdjustment(AdjustmentInterface $adjustment);

    /**
     * Removes a given adjustment
     *
     * @param AdjustmentInterface $adjustment
     *
     * @return $this
     */
    public function removeAdjustment(AdjustmentInterface $adjustment);

    /**
     * Removes all adjustments
     *
     * @return $this
     */
    public function clearAdjustments();

    /**
     * Get the total adjustment amount
     *
     * @return float
     */
    public function getAdjustmentTotal();

    /**
     * Recalculates the adjustment amount
     *
     * @return $this
     */
    public function calculateAdjustmentsTotal();

} 