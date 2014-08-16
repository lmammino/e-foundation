<?php

namespace LMammino\EFoundation\Variation\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;

use Doctrine\Common\Collections\Collection;

/**
 * Interface OptionInterface
 *
 * @package LMammino\EFoundation\Variation\Model
 */
interface OptionInterface extends IdentifiableInterface, TimestampableInterface
{
    /**
     * Get the name
     *
     * @return string
     */
    public function getName();

    /**
     * Set the name
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

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
     * Get values
     *
     * @return Collection|OptionValueInterface[]
     */
    public function getValues();

    /**
     * Set values
     *
     * @param Collection $values
     *
     * @return $this
     */
    public function setValues(Collection $values);

    /**
     * Add a value
     *
     * @param OptionValueInterface $value
     *
     * @return $this
     */
    public function addValue(OptionValueInterface $value);

    /**
     * Remove a value
     *
     * @param OptionValueInterface $value
     *
     * @return $this
     */
    public function removeValue(OptionValueInterface $value);

    /**
     * Check if has a given value
     *
     * @param OptionValueInterface $value
     *
     * @return boolean
     */
    public function hasValue(OptionValueInterface $value);
}
