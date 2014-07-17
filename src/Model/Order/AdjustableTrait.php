<?php

namespace LMammino\EFoundation\Model\Order;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AdjustableTrait
 *
 * @package LMammino\EFoundation\Model\Order
 */
trait AdjustableTrait
{
    /**
     * @var Collection $adjustments
     */
    protected $adjustments;

    /**
     * @var integer $adjustmentsTotal
     */
    protected $adjustmentsTotal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adjustments = new ArrayCollection();
    }

    /**
     * Get adjustments
     *
     * @return Collection|AdjustmentInterface[]
     */
    public function getAdjustments()
    {
        return $this->adjustments;
    }

    /**
     * Set adjustments
     *
     * @param Collection $adjustments
     *
     * @return $this
     */
    public function setAdjustments(Collection $adjustments)
    {
        $this->adjustmentsTotal = null;
        $this->adjustments = $adjustments;

        return $this;
    }

    /**
     * Add adjustment
     *
     * @param AdjustmentInterface $adjustment
     *
     * @return $this
     */
    public function addAdjustment(AdjustmentInterface $adjustment)
    {
        if (!$this->hasAdjustment($adjustment)) {
            $this->adjustmentsTotal = null;
            $adjustment->setAdjustable($this);
            $this->adjustments->add($adjustment);
        }

        return $this;
    }

    /**
     * Check if contains a given adjustment
     *
     * @param AdjustmentInterface $adjustment
     *
     * @return boolean
     */
    public function hasAdjustment(AdjustmentInterface $adjustment)
    {
        return $this->adjustments->contains($adjustment);
    }

    /**
     * Removes a given adjustment
     *
     * @param AdjustmentInterface $adjustment
     *
     * @return $this
     */
    public function removeAdjustment(AdjustmentInterface $adjustment)
    {
        if ($this->hasAdjustment($adjustment)) {
            $this->adjustmentsTotal = null;
            $adjustment->setAdjustable(null);
            $this->adjustments->removeElement($adjustment);
        }

        return $this;
    }

    /**
     * Removes all adjustments
     *
     * @return $this
     */
    public function clearAdjustments()
    {
        $this->adjustmentsTotal = null;
        $this->adjustments->clear();
    }

    /**
     * Get the total adjustment amount
     *
     * @return float
     */
    public function getAdjustmentTotal()
    {
        if (null === $this->adjustmentsTotal) {
            $this->calculateAdjustmentsTotal();
        }

        return $this->adjustmentsTotal;
    }

    /**
     * Recalculates the adjustment amount
     *
     * @return $this
     */
    public function calculateAdjustmentsTotal()
    {
        $this->adjustmentsTotal = 0;

        foreach ($this->adjustments as $adjustment) {
            if (!$adjustment->isNeutral()) {
                $this->adjustmentsTotal += $adjustment->getAmount();
            }
        }

        return $this;
    }

}