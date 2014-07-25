<?php

namespace LMammino\EFoundation\Model\Variation;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait VariableTrait
 *
 * @package LMammino\EFoundation\Model\Variation
 */
trait VariableTrait
{
    /**
     * @var ArrayCollection $variants
     */
    protected $variants;

    /**
     * @var ArrayCollection $variabilityOptions
     */
    protected $variabilityOptions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->variants = new ArrayCollection();
        $this->variabilityOptions = new ArrayCollection();
    }

    /**
     * Get variants
     *
     * @return Collection|VariantInterface[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * Set variants
     *
     * @param Collection $variants
     *
     * @return $this
     */
    public function setVariants(Collection $variants)
    {
        $this->variants = $variants;

        return $this;
    }

    /**
     * Get the master variant
     *
     * @return VariantInterface|null
     */
    public function getMasterVariant()
    {
        /** @var VariantInterface $variant */
        foreach ($this->variants as $variant) {
            if ($variant->isMaster()) {
                return $variant;
            }
        }

        return null;
    }

    /**
     * Set the master variant
     *
     * @param VariantInterface $masterVariant
     *
     * @return $this
     */
    public function setMasterVariant(VariantInterface $masterVariant)
    {
        $masterVariant->setMaster(true);

        /** @var VariantInterface $variant */
        foreach ($this->variants as $variant) {
            if ($variant->isMaster() && $variant !== $masterVariant) {
                $variant->setMaster(false);
            }
        }

        if (!$this->variants->contains($masterVariant)) {
            $masterVariant->setObject($this);
            $this->variants->add($masterVariant);
        }

        return $this;
    }

    /**
     * Check if has variants
     *
     * @return boolean
     */
    public function hasVariants()
    {
        return !$this->variants->isEmpty();
    }

    /**
     * Adds a variant
     *
     * @param VariantInterface $variant
     *
     * @return $this
     */
    public function addVariant(VariantInterface $variant)
    {
        if (!$this->hasVariant($variant)) {
            $variant->setObject($this);
            $this->variants->add($variant);
        }

        return $this;
    }

    /**
     * Removes a variant
     *
     * @param VariantInterface $variant
     *
     * @return $this
     */
    public function removeVariant(VariantInterface $variant)
    {
        if ($this->hasVariant($variant)) {
            $variant->setObject(null);
            $this->variants->removeElement($variant);
        }

        return $this;
    }

    /**
     * Checks if has a given variant
     *
     * @param VariantInterface $variant
     *
     * @return boolean
     */
    public function hasVariant(VariantInterface $variant)
    {
        return $this->variants->contains($variant);
    }

    /**
     * Checks if has any variability option
     *
     * @return boolean
     */
    public function hasVariabilityOptions()
    {
        return !$this->variabilityOptions->isEmpty();
    }

    /**
     * Gets all variability options
     *
     * @return Collection|OptionInterface[]
     */
    public function getVariabilityOptions()
    {
        return $this->variabilityOptions;
    }

    /**
     * Sets all variability options
     *
     * @param Collection $variabilityOptions
     *
     * @return $this
     */
    public function setVariabilityOptions(Collection $variabilityOptions)
    {
        $this->variabilityOptions = $variabilityOptions;

        return $this;
    }

    /**
     * Adds a given variability option
     *
     * @param OptionInterface $variabilityOption
     *
     * @return $this
     */
    public function addVariabilityOption(OptionInterface $variabilityOption)
    {
        if (!$this->hasVariabilityOption($variabilityOption)) {
            $this->variabilityOptions->add($variabilityOption);
        }

        return $this;
    }

    /**
     * Removes a given variability option
     *
     * @param OptionInterface $variabilityOption
     *
     * @return $this
     */
    public function removeVariabilityOption(OptionInterface $variabilityOption)
    {
        if ($this->hasVariabilityOption($variabilityOption)) {
            $this->variabilityOptions->removeElement($variabilityOption);
        }

        return $this;
    }

    /**
     * Check if has a given variability option
     *
     * @param OptionInterface $variabilityOption
     *
     * @return boolean
     */
    public function hasVariabilityOption(OptionInterface $variabilityOption)
    {
        return $this->variabilityOptions->contains($variabilityOption);
    }
}
