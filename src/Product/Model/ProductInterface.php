<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface;
use LMammino\EFoundation\Common\Model\IdentifiableInterface;
use LMammino\EFoundation\Common\Model\SoftDeletableInterface;
use LMammino\EFoundation\Common\Model\TimestampableInterface;
use LMammino\EFoundation\Variation\Model\VariableInterface;

/**
 * Interface ProductInterface
 *
 * @package LMammino\EFoundation\Product\Model
 */
interface ProductInterface extends
    IdentifiableInterface,
    AttributeSubjectInterface,
    VariableInterface,
    SoftDeletableInterface,
    TimestampableInterface
{
    /**
     * Get product name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set product name.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Get permalink/slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set the permalink.
     *
     * @param string $slug
     */
    public function setSlug($slug);

    /**
     * Get product name.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set product description.
     *
     * @param string $description
     */
    public function setDescription($description);

    /**
     * Check whether the product is available.
     *
     * @return Boolean
     */
    public function isAvailable();

    /**
     * Return available on.
     *
     * @return \DateTime
     */
    public function getAvailableOn();

    /**
     * Set available on.
     *
     * @param \DateTime $availableOn
     */
    public function setAvailableOn(\DateTime $availableOn);

    /**
     * Get meta keywords.
     *
     * @return string
     */
    public function getMetaKeywords();

    /**
     * Set meta keywords for the product.
     *
     * @param string $metaKeywords
     */
    public function setMetaKeywords($metaKeywords);

    /**
     * Get meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Set meta description for the product.
     *
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription);
}
