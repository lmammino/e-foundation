<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Attribute\Model\AttributeSubjectTrait;
use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\SoftDeletableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;
use LMammino\EFoundation\Variation\Model\OptionSubjectTrait;
use LMammino\EFoundation\Variation\Model\VariableTrait;

/**
 * Class Product
 *
 * @package LMammino\EFoundation\Product\Model
 */
class Product implements ProductInterface
{
    use IdentifiableTrait;
    use AttributeSubjectTrait {
        AttributeSubjectTrait::__construct as private __attributeSubjectConstruct;
    }
    use OptionSubjectTrait {
        OptionSubjectTrait::__construct as private __optionSubjectConstruct;
    }
    use VariableTrait {
        VariableTrait::__construct as private __variableConstruct;
    }
    use SoftDeletableTrait;
    use TimestampableTrait {
        TimestampableTrait::__construct as __timestampableConstruct;
        TimestampableTrait::onPrePersist as __timestampableOnPrePersist;
        TimestampableTrait::onPreUpdate as __timestampableOnPreUpdate;
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
        $this->__optionSubjectConstruct();
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

    /**
     * {@inheritDoc}
     */
    public function onPrePersist()
    {
        $this->__timestampableOnPrePersist();
    }

    /**
     * {@inheritDoc}
     */
    public function onPreUpdate()
    {
        $this->__timestampableOnPreUpdate();
    }
}
