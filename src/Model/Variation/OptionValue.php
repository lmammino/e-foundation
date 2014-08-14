<?php

namespace LMammino\EFoundation\Model\Variation;

use LMammino\EFoundation\Model\IdentifiableTrait;

/**
 * Class OptionValue
 *
 * @package LMammino\EFoundation\Model\Variation
 */
class OptionValue implements OptionValueInterface
{
    use IdentifiableTrait;

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
    public function getOption()
    {
        return $this->option;
    }

    /**
     * {@inheritDoc}
     */
    public function setOption(OptionInterface $option = null)
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
    public function getOptionName()
    {
        $this->assertOptionIsSet();

        return $this->option->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionPresentation()
    {
        $this->assertOptionIsSet();

        return $this->option->getPresentation();
    }

    /**
     * Checks if the option is set and throws an exception whether it's not
     *
     * @throws \BadMethodCallException
     */
    private function assertOptionIsSet()
    {
        if (null === $this->option) {
            throw new \BadMethodCallException('This value has not an associated option');
        }
    }
}
