<?php

namespace LMammino\EFoundation\Attribute\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;

/**
 * Interface AttributeValueInterface
 *
 * @package LMammino\EFoundation\Attribute\Model
 */
interface AttributeValueInterface extends IdentifiableInterface
{
    /**
     * Get subject (the object who holds the attribute for which the value is set)
     *
     * @return AttributeSubjectInterface
     */
    public function getSubject();

    /**
     * Set the subject
     *
     * @param AttributeSubjectInterface $subject
     *
     * @return $this
     */
    public function setSubject(AttributeSubjectInterface $subject = null);

    /**
     * Get attribute (the attribute for which the value is set)
     *
     * @return AttributeInterface
     */
    public function getAttribute();

    /**
     * Set the attribute
     *
     * @param AttributeInterface $attribute
     *
     * @return $this
     */
    public function setAttribute(AttributeInterface $attribute = null);

    /**
     * Get the value
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Set the value
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value);

    /**
     * Proxy method to get the attribute name
     *
     * @return string
     */
    public function getAttributeName();

    /**
     * Proxy method to get the attribute presentation
     *
     * @return string
     */
    public function getAttributePresentation();

    /**
     * Proxy method to get the attribute type
     *
     * @return string
     */
    public function getAttributeType();

    /**
     * Proxy method to get the attribute configuration
     *
     * @return array
     */
    public function getAttributeConfiguration();
}
