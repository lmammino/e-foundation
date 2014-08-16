<?php

namespace LMammino\EFoundation\Attribute\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait AttributeSubjectTrait
 *
 * @package LMammino\EFoundation\Attribute\Model
 */
trait AttributeSubjectTrait
{
    /**
     * @var Collection $attributes
     */
    protected $attributeValues;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attributeValues = new ArrayCollection();
    }

    /**
     * Get the attribute values
     *
     * @return Collection|AttributeValueInterface[]
     */
    public function getAttributeValues()
    {
        return $this->attributeValues;
    }

    /**
     * Set the attribute values
     *
     * @param Collection $attributesValues
     *
     * @return $this
     */
    public function setAttributesValues(Collection $attributesValues)
    {
        foreach ($attributesValues as $attributeValue) {
            $this->addAttributeValue($attributeValue);
        }

        return $this;
    }

    /**
     * Add an attribute value
     *
     * @param AttributeValueInterface $attributeValue
     *
     * @return $this
     */
    public function addAttributeValue(AttributeValueInterface $attributeValue)
    {
        if (!$this->attributeValues->contains($attributeValue)) {
            $attributeValue->setSubject($this);
            $this->attributeValues->add($attributeValue);
        }

        return $this;
    }

    /**
     * Remove an attribute value
     *
     * @param AttributeValueInterface $attributeValue
     *
     * @return $this
     */
    public function removeAttributeValue(AttributeValueInterface $attributeValue)
    {
        if ($this->attributeValues->contains($attributeValue)) {
            $attributeValue->setSubject(null);
            $this->attributeValues->removeElement($attributeValue);
        }

        return $this;
    }

    /**
     * Check if has a given attribute value
     *
     * @param AttributeValueInterface $attributeValue
     *
     * @return boolean
     */
    public function hasAttributeValue(AttributeValueInterface $attributeValue)
    {
        return $this->attributeValues->contains($attributeValue);
    }

    /**
     * Check if has an attribute value that matches a given name
     *
     * @param string $attributeValueName
     *
     * @return boolean
     */
    public function hasAttributeValueByName($attributeValueName)
    {
        /** @var AttributeValueInterface $attributeValue */
        foreach ($this->attributeValues as $attributeValue) {
            if ($attributeValue->getAttributeName() == $attributeValueName) {
                return true;
            }
        }

        return false;
    }

    /**
     * Gets an attribute value if matches a given name or null instead
     *
     * @param string $attributeValueName
     *
     * @return AttributeValueInterface|null
     */
    public function getAttributeValueByName($attributeValueName)
    {
        /** @var AttributeValueInterface $attributeValue */
        foreach ($this->attributeValues as $attributeValue) {
            if ($attributeValue->getAttributeName() == $attributeValueName) {
                return $attributeValue;
            }
        }

        return null;
    }
}
