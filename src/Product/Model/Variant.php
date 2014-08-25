<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Variation\Model\VariableInterface;
use LMammino\EFoundation\Variation\Model\Variant as BaseVariant;

/**
 * Class Variant
 *
 * @package LMammino\EFoundation\Product\Model
 */
class Variant extends BaseVariant implements VariantInterface
{
    /**
     * @var ProductInterface $product
     */
    protected $product;

    /**
     * @var \DateTime $availableOn
     */
    protected $availableOn;

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
        return $this->setObject($product);
    }

    /**
     * {@inheritDoc}
     */
    public function setObject(VariableInterface $object = null)
    {
        $this->object = $this->product = $object;

        return $this;
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
    public function setAvailableOn(\DateTime $availableOn = null)
    {
        $this->availableOn = $availableOn;

        return $this;
    }
}
