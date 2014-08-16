<?php

namespace LMammino\EFoundation\Model\Product;

use LMammino\EFoundation\Model\Attribute\AttributeSubjectInterface;
use LMammino\EFoundation\Model\IdentifiableInterface;
use LMammino\EFoundation\Model\SoftDeletableInterface;
use LMammino\EFoundation\Model\TimestampableInterface;
use LMammino\EFoundation\Model\Variation\VariableInterface;

/**
 * Interface ProductInterface
 *
 * @package LMammino\EFoundation\Model\Product
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
