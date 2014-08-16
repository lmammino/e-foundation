<?php

namespace LMammino\EFoundation\Variation\Model;

use Doctrine\Common\Collections\Collection;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;

/**
 * Interface VariableInterface
 *
 * @package LMammino\EFoundation\Variation\Model
 */
interface VariableInterface extends IdentifiableInterface
{
    /**
     * Get the master variant
     *
     * @return VariantInterface|null
     */
    public function getMasterVariant();

    /**
     * Set the master variant
     *
     * @param VariantInterface $masterVariant
     *
     * @return $this
     */
    public function setMasterVariant(VariantInterface $masterVariant);

    /**
     * Check if has variants
     *
     * @return boolean
     */
    public function hasVariants();

    /**
     * Get variants
     *
     * @return Collection|VariantInterface[]
     */
    public function getVariants();

    /**
     * Set variants
     *
     * @param Collection $variants
     *
     * @return $this
     */
    public function setVariants(Collection $variants);

    /**
     * Adds a variant
     *
     * @param VariantInterface $variant
     *
     * @return $this
     */
    public function addVariant(VariantInterface $variant);

    /**
     * Removes a variant
     *
     * @param VariantInterface $variant
     *
     * @return $this
     */
    public function removeVariant(VariantInterface $variant);

    /**
     * Checks if has a given variant
     *
     * @param VariantInterface $variant
     *
     * @return boolean
     */
    public function hasVariant(VariantInterface $variant);

    /**
     * Checks if has any variability option
     *
     * @return boolean
     */
    public function hasVariabilityOptions();

    /**
     * Gets all variability options
     *
     * @return Collection|OptionInterface[]
     */
    public function getVariabilityOptions();

    /**
     * Sets all variability options
     *
     * @param Collection $variabilityOptions
     *
     * @return $this
     */
    public function setVariabilityOptions(Collection $variabilityOptions);

    /**
     * Adds a given variability option
     *
     * @param OptionInterface $variabilityOption
     *
     * @return $this
     */
    public function addVariabilityOption(OptionInterface $variabilityOption);

    /**
     * Removes a given variability option
     *
     * @param OptionInterface $variabilityOption
     *
     * @return $this
     */
    public function removeVariabilityOption(OptionInterface $variabilityOption);

    /**
     * Check if has a given variability option
     *
     * @param OptionInterface $variabilityOption
     *
     * @return boolean
     */
    public function hasVariabilityOption(OptionInterface $variabilityOption);
}
