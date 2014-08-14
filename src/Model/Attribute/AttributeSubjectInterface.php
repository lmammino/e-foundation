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
     * Get the attribute values
     *
     * @return Collection|AttributeValueInterface[]
     */
    public function getAttributeValues();

    /**
     * Set the attribute values
     *
     * @param Collection $attributesValues
     *
     * @return $this
     */
    public function setAttributesValues(Collection $attributesValues);

    /**
     * Add an attribute value
     *
     * @param AttributeValueInterface $attributeValue
     *
     * @return $this
     */
    public function addAttributeValue(AttributeValueInterface $attributeValue);

    /**
     * Remove an attribute value
     *
     * @param AttributeValueInterface $attributeValue
     *
     * @return $this
     */
    public function removeAttributeValue(AttributeValueInterface $attributeValue);

    /**
     * Check if has a given attribute value
     *
     * @param AttributeValueInterface $attributeValue
     *
     * @return boolean
     */
    public function hasAttributeValue(AttributeValueInterface $attributeValue);

    /**
     * Check if has an attribute value that matches a given name
     *
     * @param string $attributeValueName
     *
     * @return boolean
     */
    public function hasAttributeValueByName($attributeValueName);

    /**
     * Gets an attribute value if matches a given name or null instead
     *
     * @param string $attributeValueName
     *
     * @return AttributeValueInterface|null
     */
    public function getAttributeValueByName($attributeValueName);
}
