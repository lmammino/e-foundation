<?php

namespace LMammino\EFoundation\Model\Attribute;

use LMammino\EFoundation\Model\IdentifiableTrait;

class Attribute implements AttributeInterface
{
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
     * @var string $type
     */
    protected $type;

    /**
     * @var array $configuration
     */
    protected $configuration;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->configuration = array();
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * {@inheritDoc}
     */
    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }
}
