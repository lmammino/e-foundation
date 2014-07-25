<?php

namespace LMammino\EFoundation\Model\Variation;

/**
 * Class OptionValue
 *
 * @package LMammino\EFoundation\Model\Variation
 */
class OptionValue implements OptionValueInterface
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var OptionInterface $option
     */
    protected $option;

    /**
     * @var mixed $value
     */
    protected $value;

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
    public function getOption()
    {
        return $this->option;
    }

    /**
     * {@inheritDoc}
     */
    public function setOption(OptionInterface $option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionPresentation()
    {
        if (null === $this->option) {
            throw new \BadMethodCallException('This value has not an associated option');
        }

        return $this->option->getPresentation();
    }
}
