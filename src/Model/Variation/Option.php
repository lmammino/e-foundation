<?php

namespace LMammino\EFoundation\Model\Variation;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use LMammino\EFoundation\Model\IdentifiableTrait;
use LMammino\EFoundation\Model\TimestampableTrait;

/**
 * Class Option
 *
 * @package LMammino\EFoundation\Model\Variation
 */
class Option implements OptionInterface
{
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }
    use IdentifiableTrait;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $presentation
     */
    protected $presentation;

    /**
     * @var Collection $values
     */
    protected $values;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->values = new ArrayCollection();
        $this->__timestampableConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

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
    public function getValues()
    {
        return $this->values;
    }

    /**
     * {@inheritDoc}
     */
    public function setValues(Collection $values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addValue(OptionValueInterface $value)
    {
        if (!$this->hasValue($value)) {
            $value->setOption($this);
            $this->values->add($value);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeValue(OptionValueInterface $value)
    {
        if ($this->hasValue($value)) {
            $value->setOption(null);
            $this->values->removeElement($value);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasValue(OptionValueInterface $value)
    {
        return $this->values->contains($value);
    }
}
