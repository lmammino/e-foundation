<?php

namespace LMammino\EFoundation\Variation\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait OptionSubjectTrait
 *
 * @package LMammino\EFoundation\Variation\Model
 */
trait OptionSubjectTrait
{
    /**
     * @var Collection $options
     */
    protected $options;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * Get options
     *
     * @return Collection|OptionInterface[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set options
     *
     * @param Collection $options
     * @return $this
     */
    public function setOptions(Collection $options)
    {
        /** @var OptionInterface $option */
        foreach ($options as $option) {
            $this->addOption($option);
        }

        return $this;
    }

    /**
     * Check if has a given option
     *
     * @param OptionInterface $option
     * @return boolean
     */
    public function hasOption(OptionInterface $option)
    {
        return $this->options->contains($option);
    }

    /**
     * Add a given option
     *
     * @param OptionInterface $option
     * @return $this
     */
    public function addOption(OptionInterface $option)
    {
        if (!$this->hasOption($option)) {
            $this->options->add($option);
        }

        return $this;
    }

    /**
     * Remove a given option
     *
     * @param OptionInterface $option
     * @return $this
     */
    public function removeOption(OptionInterface $option)
    {
        if ($this->hasOption($option)) {
            $this->options->removeElement($option);
        }

        return $this;
    }
}
