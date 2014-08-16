<?php

namespace LMammino\EFoundation\Model\Variation;

use Doctrine\Common\Collections\Collection;

use LMammino\EFoundation\Model\IdentifiableInterface;
use LMammino\EFoundation\Model\SoftDeletableInterface;
use LMammino\EFoundation\Model\TimestampableInterface;

interface VariantInterface extends IdentifiableInterface, SoftDeletableInterface, TimestampableInterface
{
    /**
     * Checks if it is the master variant for the related variable object
     *
     * @return boolean
     */
    public function isMaster();

    /**
     * Set master attribute
     *
     * @param boolean $master
     *
     * @return $this
     */
    public function setMaster($master);

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation();

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return $this
     */
    public function setPresentation($presentation);

    /**
     * Get the related variable object
     *
     * @return VariableInterface
     */
    public function getObject();

    /**
     * Set the variable object
     *
     * @param VariableInterface $object
     *
     * @return $this
     */
    public function setObject(VariableInterface $object = null);

    /**
     * Get all the option values for this variant
     *
     * @return Collection|OptionValueInterface[]
     */
    public function getOptionValues();

    /**
     * Set all the option values for this variant
     *
     * @param Collection $optionValues
     *
     * @return $this
     */
    public function setOptionValues(Collection $optionValues);

    /**
     * Adds an option value
     *
     * @param OptionValueInterface $optionValue
     *
     * @return $this
     */
    public function addOptionValue(OptionValueInterface $optionValue);

    /**
     * Removes an option value
     *
     * @param OptionValueInterface $optionValue
     *
     * @return $this
     */
    public function removeOptionValue(OptionValueInterface $optionValue);

    /**
     * Checks if has a given option value
     *
     * @param OptionValueInterface $optionValue
     *
     * @return boolean
     */
    public function hasOptionValue(OptionValueInterface $optionValue);

    /**
     * Sets a default master variant that will be used to inherit options
     *
     * @param VariantInterface $masterVariant
     *
     * @return $this
     */
    public function inheritDefaults(VariantInterface $masterVariant);
}
