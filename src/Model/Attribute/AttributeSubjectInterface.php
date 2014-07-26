<?php

namespace LMammino\EFoundation\Model\Attribute;

use Doctrine\Common\Collections\Collection;

/**
 * Interface AttributeSubjectInterface
 *
 * @package LMammino\EFoundation\Model\Attribute
 */
interface AttributeSubjectInterface
{
    /**
     * Get the attributes
     *
     * @return Collection|AttributeInterface[]
     */
    public function getAttributes();

    /**
     * Set the attributes
     *
     * @param Collection $attributes
     *
     * @return $this
     */
    public function setAttributes(Collection $attributes);

    /**
     * Add an attribute
     *
     * @param AttributeInterface $attribute
     *
     * @return $this
     */
    public function addAttribute(AttributeInterface $attribute);

    /**
     * Remove an attribute
     *
     * @param AttributeInterface $attribute
     *
     * @return $this
     */
    public function removeAttribute(AttributeInterface $attribute);

    /**
     * Check if has a given attribute
     *
     * @param AttributeInterface $attribute
     *
     * @return boolean
     */
    public function hasAttribute(AttributeInterface $attribute);

    /**
     * Check if has an attribute that matches a given name
     *
     * @param string $attributeName
     *
     * @return boolean
     */
    public function hasAttributeByName($attributeName);

    /**
     * Gets an attribute if matches a given name or null instead
     *
     * @param string $attributeName
     *
     * @return AttributeInterface|null
     */
    public function getAttributeByName($attributeName);
}
