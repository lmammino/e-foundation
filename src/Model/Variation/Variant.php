<?php

namespace LMammino\EFoundation\Model\Variation;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use LMammino\EFoundation\Model\SoftDeletableTrait;
use LMammino\EFoundation\Model\TimestampableTrait;

/**
 * Class Variant
 *
 * @package LMammino\EFoundation\Model\Variation
 */
class Variant implements VariantInterface
{
    use SoftDeletableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }

    /**
     * @var boolean $master
     */
    protected $master = false;

    /**
     * @var VariableInterface $object
     */
    protected $object;

    /**
     * @var string $presentation
     */
    protected $presentation;

    /**
     * @var ArrayCollection $optionValues
     */
    protected $optionValues;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->optionValues = new ArrayCollection();
        $this->__timestampableConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function isMaster()
    {
        return $this->master;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaster($master)
    {
        $this->master = (boolean) $master;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * {@inheritDoc}
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * {@inheritDoc}
     */
    public function setObject(VariableInterface $object = null)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionValues()
    {
        return $this->optionValues;
    }

    /**
     * {@inheritDoc}
     */
    public function setOptionValues(Collection $optionValues)
    {
        $this->optionValues = $optionValues;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addOptionValue(OptionValueInterface $optionValue)
    {
        if (!$this->hasOptionValue($optionValue)) {
            $this->optionValues->add($optionValue);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeOptionValue(OptionValueInterface $optionValue)
    {
        if ($this->hasOptionValue($optionValue)) {
            $this->optionValues->removeElement($optionValue);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasOptionValue(OptionValueInterface $optionValue)
    {
        return $this->optionValues->contains($optionValue);
    }

    /**
     * {@inheritDoc}
     */
    public function inheritDefaults(VariantInterface $masterVariant)
    {
        if (!$masterVariant->isMaster()) {
            throw new \InvalidArgumentException('Cannot inherit values from non master variant.');
        }

        if ($this->isMaster()) {
            throw new \LogicException('Master variant cannot inherit from another master variant.');
        }

        return $this;
    }
}
