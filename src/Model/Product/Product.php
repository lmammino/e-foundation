<?php

namespace LMammino\EFoundation\Model\Product;

use LMammino\EFoundation\Model\Attribute\AttributeSubjectTrait;
use LMammino\EFoundation\Model\IdentifiableTrait;
use LMammino\EFoundation\Model\SoftDeletableTrait;
use LMammino\EFoundation\Model\TimestampableTrait;
use LMammino\EFoundation\Model\Variation\VariableTrait;

/**
 * Class Product
 *
 * @package LMammino\EFoundation\Model\Product
 */
class Product implements ProductInterface
{
    use IdentifiableTrait;
    use AttributeSubjectTrait {
        AttributeSubjectTrait::__construct as private __attributeSubjectConstruct;
    }
    use VariableTrait {
        VariableTrait::__construct as private __variableConstruct;
    }
    use SoftDeletableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as __timestampableConstruct;
    }

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $slug
     */
    protected $slug;

    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var \DateTime $availableOn
     */
    protected $availableOn;

    /**
     * @var string $metaKeywords
     */
    protected $metaKeywords;

    /**
     * @var string $metaDescription
     */
    protected $metaDescription;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->availableOn = new \DateTime();
        $this->__attributeSubjectConstruct();
        $this->__variableConstruct();
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
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isAvailable()
    {
        $now = new \DateTime();
        return $now >= $this->availableOn;
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableOn()
    {
        return $this->availableOn;
    }

    /**
     * {@inheritDoc}
     */
    public function setAvailableOn(\DateTime $availableOn)
    {
        $this->availableOn = $availableOn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }
}
