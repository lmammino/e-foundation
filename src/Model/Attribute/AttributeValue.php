<?php

namespace LMammino\EFoundation\Model\Attribute;

use LMammino\EFoundation\Model\IdentifiableTrait;

class AttributeValue implements AttributeValueInterface
{
    use IdentifiableTrait;

    /**
     * @var AttributeSubjectInterface $subject
     */
    protected $subject;

    /**
     * @var AttributeInterface $attribute
     */
    protected $attribute;

    /**
     * @var string $value
     */
    protected $value;

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject(AttributeSubjectInterface $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute(AttributeInterface $attribute = null)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributeName()
    {
        $this->assertAttributeIsSet();

        return $this->attribute->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributePresentation()
    {
        $this->assertAttributeIsSet();

        return $this->attribute->getPresentation();
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributeType()
    {
        $this->assertAttributeIsSet();

        return $this->attribute->getType();
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributeConfiguration()
    {
        $this->assertAttributeIsSet();

        return $this->attribute->getConfiguration();
    }

    /**
     * Checks if the attribute is set and throws an exception whether it's not
     *
     * @throws \BadMethodCallException
     */
    private function assertAttributeIsSet()
    {
        if (null === $this->attribute) {
            throw new \BadMethodCallException('This instance has no attribute set so you can\'t access its values');
        }
    }
}
