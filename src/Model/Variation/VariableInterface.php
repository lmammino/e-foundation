<?php

namespace LMammino\EFoundation\Model\Variation;

use Doctrine\Common\Collections\Collection;

/**
 * Interface VariableInterface
 *
 * @package LMammino\EFoundation\Model\Variation
 */
interface VariableInterface
{
    /**
     * Get the master variant
     *
     * @return VariantInterface
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
     * Checks if has any available option
     *
     * @return boolean
     */
    public function hasAvailableOptions();

    /**
     * Gets all available options
     *
     * @return Collection|OptionInterface[]
     */
    public function getAvailableOptions();

    /**
     * Sets all available options
     *
     * @param Collection $availableOptions
     *
     * @return $this
     */
    public function setAvailableOptions(Collection $availableOptions);

    /**
     * Adds a given available option
     *
     * @param OptionInterface $availableOption
     *
     * @return $this
     */
    public function addAvailableOption(OptionInterface $availableOption);

    /**
     * Removes a given available option
     *
     * @param OptionInterface $availableOption
     *
     * @return $this
     */
    public function removeAvailableOption(OptionInterface $availableOption);

    /**
     * Check if has a given available option
     *
     * @param OptionInterface $availableOption
     *
     * @return boolean
     */
    public function hasAvailableOption(OptionInterface $availableOption);
}
