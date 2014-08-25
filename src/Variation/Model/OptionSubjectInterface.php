<?php

namespace LMammino\EFoundation\Variation\Model;

use Doctrine\Common\Collections\Collection;

/**
 * Interface OptionSubjectInterface
 *
 * @package LMammino\EFoundation\Variation\Model
 */
interface OptionSubjectInterface
{
    /**
     * Get options
     *
     * @return Collection|OptionInterface[]
     */
    public function getOptions();

    /**
     * Set options
     *
     * @param Collection $options
     * @return $this
     */
    public function setOptions(Collection $options);

    /**
     * Check if has a given option
     *
     * @param OptionInterface $option
     * @return boolean
     */
    public function hasOption(OptionInterface $option);

    /**
     * Add a given option
     *
     * @param OptionInterface $option
     * @return $this
     */
    public function addOption(OptionInterface $option);

    /**
     * Remove a given option
     *
     * @param OptionInterface $option
     * @return $this
     */
    public function removeOption(OptionInterface $option);
}
