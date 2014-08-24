<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface;
use LMammino\EFoundation\Attribute\Model\AttributeValue as BaseAttributeValue;

/**
 * Class AttributeValue
 *
 * @package LMammino\EFoundation\Product\Model
 */
class AttributeValue extends BaseAttributeValue implements AttributeValueInterface
{
    /**
     * @var ProductInterface $product
     */
    protected $product;

    /**
     * {@inheritDoc}
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * {@inheritDoc}
     */
    public function setProduct(ProductInterface $product = null)
    {
        return $this->setSubject($product);
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject(AttributeSubjectInterface $subject = null)
    {
        $this->subject = $this->product = $subject;

        return $this;
    }
}
