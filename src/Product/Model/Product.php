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
     * @var string $title
     */
    protected $title;

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
     * @var string $locale
     */
    protected $locale;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Checks if the product is available at a certain date
     *
     * @param \DateTime $date
     * @return bool
     */
    public function isAvailableAt(\DateTime $date)
    {
        return ($this->availableOn !== null && $this->availableOn <= $date);
    }

    /**
     * Checks if the product is available now
     *
     * @return bool
     */
    public function isAvailableNow()
    {
        return $this->isAvailableAt(new \DateTime());
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
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

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
