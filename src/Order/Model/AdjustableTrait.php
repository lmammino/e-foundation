<?php

namespace LMammino\EFoundation\Order\Model;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Trait AdjustableTrait
 *
 * @package LMammino\EFoundation\Order\Model
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
        $this->onAdjustmentsChange();
        foreach ($adjustments as $adjustment) {
            $this->addAdjustment($adjustment);
        }

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
            $this->onAdjustmentsChange();
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
        $this->onAdjustmentsChange();
        $this->adjustments->clear();
    }

    /**
     * Get the total adjustment amount
     *
     * @return float
     */
    public function getAdjustmentTotal()
    {
        $this->recalculateAdjustmentsTotalIfNeeded();

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

    /**
     * On pre persist
     */
    public function onPrePersist()
    {
        $this->recalculateAdjustmentsTotalIfNeeded();
    }

    /**
     * On pre update
     */
    public function onPreUpdate()
    {
        $this->recalculateAdjustmentsTotalIfNeeded();
    }

    /**
     * Function called every time the adjustment changes
     * it can be redefined to add some logic when using the trait
     */
    protected function onAdjustmentsChange()
    {
        // does nothing by default
    }

    /**
     * Recalculates adjustments total if needed
     */
    protected function recalculateAdjustmentsTotalIfNeeded()
    {
        if (null === $this->adjustmentsTotal) {
            $this->calculateAdjustmentsTotal();
        }
    }
}
